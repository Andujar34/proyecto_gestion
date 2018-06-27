<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;

class xhrController extends Controller
{
    public function getPrice(Request $request){
        $price = Services::all()->where('id',$request->id)->first()->price;
        return response()->json(['success' => true,'price'=>$price]);
    }
    public function getCustomer(Request $request){
        $customer = Customers::all()->where('id',$request->id)->first();
        return response()->json(['success' => true,'customer'=>$customer]);
    }
}
