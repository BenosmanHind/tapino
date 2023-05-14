<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productline;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(){
        
    }


    public function orderProOne(){
        $productlines = Productline::with('product')->get();
        return view('admin.order_pro_one',compact('productlines'));

    }
}
