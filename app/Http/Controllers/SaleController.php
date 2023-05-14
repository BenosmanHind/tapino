<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productline;
use App\Models\Professional;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index(){
        
    }


    public function orderProOne(){
        $productlines = Productline::with('product')->get();
        $professionals = Professional::orderByDesc('created_at')->get();
        return view('admin.order_pro_one',compact('productlines','professionals'));

    }


    public function orderProTwo(Request $request){
        $total = 0 ;
        $i = 0 ;
        $professional = Professional::find($request->professional);
        $ids = $request->product;
        $products = Productline::whereIn('id', $ids)->get();
        $qte = $request->qte;



        foreach($products as $product){
            $total = $total + $product->totalm_1 * $qte[$i];
            $i++;
        }

        dd($total);

        return view('admin.order_pro_two',compact('products','qte','professional'));

    }

    public function proInfo($id){
        return $professional = Professional::find($id);
    }
}
