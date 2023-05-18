<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Productline;
use App\Models\Professional;
use App\Models\Sale;
use App\Models\Saleline;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(){
        $time = Carbon::now();
        $products = Productline::get();
        $customers = Customer::get()->reverse();
        return view('admin.pos',compact('customers','products','time'));
    }

    public function store(Request $request){
        $ids = $request->product;
        $qtes = $request->qtes;
        $sale = new Sale();
        $sale->total = $request->total_price;
        $sale->total_f = $request->total_promo;
        $customer = Customer::find($request->customer);
        $customer->sales()->save($sale);
       
        $products = Productline::whereIn('id', $ids)->get();
   
        $i = 0;

        
        foreach( $products as $product ){
            $saleline  = new Saleline();
            $saleline->sale_id = $sale->id;
            $saleline->productline_id = $product->id;
            $saleline->qte = $request->qtes[$i];
            $saleline->price = $product->totalm_1;
            $saleline->total = $request->qtes[$i] *  $product->totalm_1;
            $saleline->save();
            $i++;
        
        }
      
        return redirect('dashboard-provider/sales')->with('success','Sale added successfully :)');
    }

}
