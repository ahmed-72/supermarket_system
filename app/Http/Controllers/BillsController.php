<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\BillItem;
use App\Models\Customer;
use App\Models\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills=Bill::paginate(10);
        return view('bills.index')->with(['bills'=>$bills]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //quantity outOfStockSelling
        $items=Item::where('quantity','>','0')->orwhere('outOfStockSelling',1)->select('id','name','price')->get();
        $customers=Customer::get();
        return view('bills.create')->with(['items'=>$items ,'customers'=>$customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { //dd($request->all());
        $validated_data= $request->validate([
            'itemsGroup'=>['required','array'],
            'itemsGroup.*.id'=>['required'],
            'itemsGroup.*.quantity'=>['required'],
            'customer_id'=>['required'],
        ]);

        DB::beginTransaction();
        try {
            $bill=Bill::create(['customer_id'=>$request['customer_id'],'totalPrice'=>0]);
            $totalPrice=0;
            for($i=0;$i<count($request['itemsGroup']);++$i){
               $item=Item::findOrFail($request['itemsGroup'][$i]['id']);

               if($item->quantity-$request['itemsGroup'][$i]['quantity'] <0 && $item->outOfStockSelling == 0 ){
                return redirect()->back()->withErrors("Sorry, we only have $item->quantity pieces of $item->name");
               }

               $item->update(['quantity'=>$item->quantity-$request['itemsGroup'][$i]['quantity']]);
               $itemPrice=$item->price * $request['itemsGroup'][$i]['quantity'];
               $totalPrice+=$itemPrice;
               $billItem=BillItem::create(['bill_id'=>$bill->id , 'item_id'=>$request['itemsGroup'][$i]['id'],'quantity'=>$request['itemsGroup'][$i]['quantity']]);
             
            } 
            if(!$request['tax']){
                $tax=(float)$totalPrice*0.16;
                $totalPrice+=$tax;
            }
            $bill->update(['totalPrice'=>$totalPrice]);
            

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
        DB::commit();

        return redirect()->route('bill.show',$bill->id)->withSuccess('Successfully added new bill .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill=Bill::with('billItems','customer')->findOrFail($id);
        return view('bills.show')->with(['bill'=>$bill]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bill::findOrFail($id)->delete();
        return redirect()->back()->withSuccess('Successfully deleted an Bill .');
    }
}