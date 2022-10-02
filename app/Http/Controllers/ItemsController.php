<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items=Item::paginate(20);
        $categoreis=Category::get();
        return view('items.index')->with(['items'=>$items ,'categoreis'=>$categoreis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated_data= $request->validate([
            'name'=>['required',],
            'barcode'=>['required','numeric', 'unique:items,barcode'],
            'price'=>['required','numeric'],
            'quantity'=>['required','numeric'],
            'category'=>['required',],
            'image'=>['required','mimes:jpg,jpeg,bmp,png,gif,svg'],
        ]);

        DB::beginTransaction();
        try {
            $imageName = time() + rand(1, 1000000) . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put('uploads/itemImages/' . $imageName, file_get_contents($request->file('image')));
            $image = 'uploads/itemImages/' . $imageName;
            if($request['outOfStockSelling']){ $outOfStockSelling=1; }else  $outOfStockSelling=0;
            $item=Item::create([ 'name'=>$request['name'] ,'barcode'=>$request['barcode'] ,'price'=>$request['price'] ,'quantity'=>$request['quantity'] ,'outOfStockSelling'=>$outOfStockSelling ,'category_id'=>$request['category'] ,'image'=>$image
        ]);

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
        DB::commit();

        return redirect()->back()->withSuccess('Successfully added new item .');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request)
    {   $id=$request['id'];
        $validated_data= $request->validate([
            'id'=>['required'],
            'barcode'=>['numeric', "unique:items,barcode,$id"],
            'price'=>['numeric'],
            'quantity'=>['numeric'],
            'image'=>['mimes:jpg,jpeg,bmp,png,gif,svg)'],
        ]);

        DB::beginTransaction();
        try {
            $item=Item::findOrFail($request['id']);
            $data=[];
            if($request['name']) $data['name']=$request['name'];
            if($request['barcode']) $data['barcode']=$request['barcode'];
            if($request['price']) $data['price']=$request['price'];
            if($request['quantity']) $data['quantity']=$request['quantity'];
            if($request['category']) $data['category_id']=$request['category'];
            if($request['outOfStockSelling']){ $data['outOfStockSelling']=1; }else  $data['outOfStockSelling']=0;
            if($request['image']){
                $imageName = time() + rand(1, 1000000) . '.' .$request->file('image')->getClientOriginalExtension();
                Storage::disk('public')->put('uploads/itemImages/' . $imageName, file_get_contents($request->file('image')));
                $image = 'uploads/itemImages/' . $imageName;
                $data['image']= $image;
            }
            $item->update($data);

           /* $imageName = time() + rand(1, 1000000) . '.' .$request->file('image')->getClientOriginalExtension();
            Storage::disk('public')->put('uploads/itemImages/' . $imageName, file_get_contents($request->file('image')));
            $image = 'uploads/itemImages/' . $imageName;

            $item=Item::create([ 'name'=>$request['name'] ,'barcode'=>$request['barcode'] ,'price'=>$request['price'] ,'quantity'=>$request['quantity'] ,'outOfStockSelling'=>$request['outOfStockSelling'] ,'category_id'=>$request['category'] ,'image'=>$image
        ]); 
        
    */

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
        DB::commit();

        return redirect()->back()->withSuccess('Successfully added new item .');
    }

     /**
     * delete Category fofr specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove_category ($id){
        Item::findOrFail($id)->update(['category_id'=>1]);
        return redirect()->back()->withSuccess('Successfully removed an item for this category .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Item::findOrFail($id)->delete();
        return redirect()->back()->withSuccess('Successfully deleted an item .');
    }
}
