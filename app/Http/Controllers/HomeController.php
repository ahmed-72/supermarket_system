<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Item;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $numOfCustomers=Customer::count();
        $numOfItems=Item::count();
        $numOfBills=Bill::count();
        $finacialReturns=Bill::sum('totalPrice');
        return view('home')->with(['numOfCustomers'=>$numOfCustomers ,'numOfItems'=>$numOfItems ,'numOfBills'=>$numOfBills ,'finacialReturns'=>$finacialReturns ,]);
    }
}
