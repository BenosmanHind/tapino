<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Emplacement;
use App\Models\Product;
use App\Models\Productline;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::orderBy('created_at','desc')->get();
        return view('admin.products',compact('products'));
    }
    public function create(){
        $categories = Category::orderBy('created_at','desc')->get();
        $emplacements = Emplacement::orderBy('created_at','desc')->get();
        return view('admin.add-product',compact('categories','emplacements'));
    }

    public function store(Request $request){
        $product = new Product();
        $product->designation = $request->designation;
        $product->designation_2 = $request->designation_2;
        $product->pricem_1 = $request->price_1;
        $product->pricem_2 = $request->price_2;
        $product->pricem_3 = $request->price_3;
        $product->qte_alert = $request->qte_alert;
        $product->emplacement = $request->emplacement;
        $product->category_id = $request->category;
        $product->save();
        for($i=0 ; $i<count($request->width);$i++){
        $product_line = new Productline();
        $product_line->product_id = $product->id;
        $product_line->width = $request->width[$i];
        $product_line->height = $request->height[$i];
        if($request->price_1){
            $product_line->totalm_1 = $request->width[$i] *  $request->height[$i] * $request->price_1;
        }
        if($request->price_2){
            $product_line->totalm_2 = $request->width[$i] *  $request->height[$i] * $request->price_2;
        }
        if($request->price_3){
            $product_line->totalm_3 = $request->width[$i] *  $request->height[$i] * $request->price_3;
        }
        $product_line->m2 = $request->width[$i] *  $request->height[$i];
        $product_line->save();
        }

    }

    public function productlines($id){
        $product = Product::find($id);
        $productlines = Productline::where('product_id',$id)->get();
        return view('admin.modal-productline',compact('productlines','product'));
    }
}
