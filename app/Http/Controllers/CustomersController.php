<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers= Customer::paginate(10);
        return view('customers.index')->with(['customers'=>$customers]);
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
        'name'=>['required'],
        'email'=>['required','email'],
        'phone'=>['required'],
        'dob'=>['required','date'],
        'image'=>['required','mimes:jpg,jpeg,bmp,png'],
    ]);

    DB::beginTransaction();
    try {
        $customer=Customer::create($request->only('name','email','phone','dob'));

        $imageName = time() + rand(1, 1000000) . '.' .$request->file('image')->getClientOriginalExtension();
        Storage::disk('public')->put('uploads/customerImages/' . $imageName, file_get_contents($request->file('image')));
        $image = 'uploads/customerImages/' . $imageName;
        $customer->update(['avatar'=>$image]);

    } catch (Exception $e) {
        DB::rollBack();
        return redirect()->back()->withErrors($e->getMessage());
    }
    DB::commit();

    return redirect()->back()->withSuccess('Successfully added new bill .');
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
    {
        $validated_data= $request->validate([
            'email'=>['email'],
            'dob'=>['date'],
            'image'=>['mimes:jpg,jpeg,bmp,png'],
        ]);
    
        DB::beginTransaction(); 
        try {
            $customer=Customer::findOrFail($request['id']);
            $data=[];
            if($request['name']) $data['name']=$request['name'];
            if($request['email']) $data['email']=$request['email'];
            if($request['phone']) $data['phone']=$request['phone'];
            if($request['dob']) $data['dob']=$request['dob'];
            if($request['image']){
                $imageName = time() + rand(1, 1000000) . '.' .$request->file('image')->getClientOriginalExtension();
                Storage::disk('public')->put('uploads/customerImages/' . $imageName, file_get_contents($request->file('image')));
                $image = 'uploads/customerImages/' . $imageName;
                $data['avatar']= $image;
            }
            $customer->update($data);
    
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
        }
        DB::commit();
    
        return redirect()->back()->withSuccess('Successfully added new bill .');  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer=Customer::findOrFail($id)->delete();
        return redirect()->back()->withSuccess('Successfully deleted customer .');
    }
}
