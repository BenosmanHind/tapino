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
        $product->reference = $request->reference;
        $product->save();
        for($i=0 ; $i<count($request->L1);$i++){

            $product_line = new Productline();
            $product_line->product_id = $product->id;

            if($request->L2[0] == null ){
                $product_line->dimension = $request->L1[$i].'x'.$request->H1[$i];
                if($request->price_1){
                    $product_line->totalm_1 = $request->L1[$i] *  $request->H1[$i] * $request->price_1;
                }
                if($request->price_2){
                    $product_line->totalm_2 = $request->L1[$i] *  $request->H1[$i] * $request->price_2;
                }
                if($request->price_3){
                    $product_line->totalm_3 = $request->L1[$i] *  $request->H1[$i] * $request->price_3;
                }
                $product_line->m2 = $request->L1[$i] *  $request->H1[$i];
                $product_line->save();
            }

            if($request->L2[0] != null && $request->L3[0] == null  ){
                $product_line->dimension = '('.$request->L1[$i].'x'.$request->H1[$i].')+('.$request->L2[$i].'x'.$request->H2[$i].')';

                if($request->price_1){
                    $product_line->totalm_1 = ($request->L1[$i]*$request->H1[$i]*$request->price_1)+($request->L2[$i]* $request->H2[$i]*$request->price_1);
                }
                if($request->price_2){
                    $product_line->totalm_2 = ($request->L1[$i]*$request->H1[$i]*$request->price_2)+($request->L2[$i]* $request->H2[$i]*$request->price_2);
                }
                if($request->price_3){
                    $product_line->totalm_3 = ($request->L1[$i]*$request->H1[$i]*$request->price_3)+($request->L2[$i]* $request->H2[$i]*$request->price_3);
                }
                $product_line->m2 = ($request->L1[$i] *  $request->H1[$i]) + ($request->L2[$i] *  $request->H2[$i]);
                $product_line->save();
            }

            if($request->L3[0] != null  ){
                if($request->L2[$i] == $request->L3[$i] && $request->H2[$i] == $request->H3[$i] ){
                    $product_line->dimension = '('.$request->L1[$i].'x'.$request->H1[$i].')+2x('.$request->L2[$i].'x'.$request->H2[$i].')';
                    if($request->price_1){
                        $product_line->totalm_1 = ($request->L1[$i]*$request->H1[$i]*$request->price_1)+2*($request->L2[$i]* $request->H2[$i]*$request->price_1);
                    }
                    if($request->price_2){
                        $product_line->totalm_2 = ($request->L1[$i]*$request->H1[$i]*$request->price_2)+2*($request->L2[$i]* $request->H2[$i]*$request->price_2);
                    }
                    if($request->price_3){
                        $product_line->totalm_3 = ($request->L1[$i]*$request->H1[$i]*$request->price_3)+2*($request->L2[$i]* $request->H2[$i]*$request->price_3);
                    }
                    $product_line->m2 = ($request->L1[$i] *  $request->H1[$i]) + 2* ($request->L2[$i] *  $request->H2[$i]);
                    $product_line->save();

                }
                else{
                    $product_line->dimension = '('.$request->L1[$i].'x'.$request->H1[$i].')+('.$request->L2[$i].'x'.$request->H2[$i].')+('.$request->L3[$i].'x'.$request->H3[$i].')';
                    if($request->price_1){
                        $product_line->totalm_1 = ($request->L1[$i]*$request->H1[$i]*$request->price_1)+ ($request->L2[$i]* $request->H2[$i]*$request->price_1) + ($request->L3[$i]* $request->H3[$i]*$request->price_1);
                    }
                    if($request->price_2){
                        $product_line->totalm_2 = ($request->L1[$i]*$request->H1[$i]*$request->price_2)+($request->L2[$i]* $request->H2[$i]*$request->price_2)+ ($request->L3[$i]* $request->H3[$i]*$request->price_2);
                    }
                    if($request->price_3){
                        $product_line->totalm_3 = ($request->L1[$i]*$request->H1[$i]*$request->price_3)+($request->L2[$i]* $request->H2[$i]*$request->price_3)+ ($request->L3[$i]* $request->H3[$i]*$request->price_3);
                    }
                    $product_line->m2 = ($request->L1[$i] *  $request->H1[$i]) +  ($request->L2[$i] *  $request->H2[$i]) +  ($request->L3[$i] *  $request->H3[$i]);
                    $product_line->save();

                }

            }

        }
       return redirect('admin/products');
    }

    public function edit($id){
        $product = Product::find($id);
        $productlines = Productline::where('product_id',$id)->get();
        $categories = Category::orderBy('created_at','desc')->get();
        $emplacements = Emplacement::orderBy('created_at','desc')->get();
        return view('admin.edit-product',compact('product','productlines','categories','emplacements'));
    }

    public function update(Request $request , $id){

        $product = Product::find($id);
        $productlines = Productline::where('product_id',$id)->get();
        foreach($productlines as $productline){
            $productline->delete();
        }
        $product->designation = $request->designation;
        $product->designation_2 = $request->designation_2;
        $product->pricem_1 = $request->price_1;
        $product->pricem_2 = $request->price_2;
        $product->pricem_3 = $request->price_3;
        $product->qte_alert = $request->qte_alert;
        $product->emplacement = $request->emplacement;
        $product->category_id = $request->category;
        $product->reference = $request->reference;
        $product->save();
        for($i=0 ; $i<count($request->L1);$i++){

            $product_line = new Productline();
            $product_line->product_id = $product->id;

            if($request->L2[0] == null ){
                $product_line->dimension = $request->L1[$i].'x'.$request->H1[$i];
                if($request->price_1){
                    $product_line->totalm_1 = $request->L1[$i] *  $request->H1[$i] * $request->price_1;
                }
                if($request->price_2){
                    $product_line->totalm_2 = $request->L1[$i] *  $request->H1[$i] * $request->price_2;
                }
                if($request->price_3){
                    $product_line->totalm_3 = $request->L1[$i] *  $request->H1[$i] * $request->price_3;
                }
                $product_line->m2 = $request->L1[$i] *  $request->H1[$i];
                $product_line->save();
            }

            if( $request->L2[0] != null && $request->L3[0] == null  ){
                $product_line->dimension = '('.$request->L1[$i].'x'.$request->H1[$i].')+('.$request->L2[$i].'x'.$request->H2[$i].')';

                if($request->price_1){
                    $product_line->totalm_1 = ($request->L1[$i]*$request->H1[$i]*$request->price_1)+($request->L2[$i]* $request->H2[$i]*$request->price_1);
                }
                if($request->price_2){
                    $product_line->totalm_2 = ($request->L1[$i]*$request->H1[$i]*$request->price_2)+($request->L2[$i]* $request->H2[$i]*$request->price_2);
                }
                if($request->price_3){
                    $product_line->totalm_3 = ($request->L1[$i]*$request->H1[$i]*$request->price_3)+($request->L2[$i]* $request->H2[$i]*$request->price_3);
                }
                $product_line->m2 = ($request->L1[$i] *  $request->H1[$i]) + ($request->L2[$i] *  $request->H2[$i]);
                $product_line->save();
            }

            if($request->L3 && $request->L3[0] != null  ){

                if( $request->L2[$i] == $request->L3[$i] && $request->H2[$i] == $request->H3[$i] ){
                    $product_line->dimension = '('.$request->L1[$i].'x'.$request->H1[$i].')+2x('.$request->L2[$i].'x'.$request->H2[$i].')';
                    if($request->price_1){
                        $product_line->totalm_1 = ($request->L1[$i]*$request->H1[$i]*$request->price_1)+2*($request->L2[$i]* $request->H2[$i]*$request->price_1);
                    }
                    if($request->price_2){
                        $product_line->totalm_2 = ($request->L1[$i]*$request->H1[$i]*$request->price_2)+2*($request->L2[$i]* $request->H2[$i]*$request->price_2);
                    }
                    if($request->price_3){
                        $product_line->totalm_3 = ($request->L1[$i]*$request->H1[$i]*$request->price_3)+2*($request->L2[$i]* $request->H2[$i]*$request->price_3);
                    }
                    $product_line->m2 = ($request->L1[$i] *  $request->H1[$i]) + 2* ($request->L2[$i] *  $request->H2[$i]);
                    $product_line->save();

                }
                else{
                    $product_line->dimension = '('.$request->L1[$i].'x'.$request->H1[$i].')+('.$request->L2[$i].'x'.$request->H2[$i].')+('.$request->L3[$i].'x'.$request->H3[$i].')';
                    if($request->price_1){
                        $product_line->totalm_1 = ($request->L1[$i]*$request->H1[$i]*$request->price_1)+ ($request->L2[$i]* $request->H2[$i]*$request->price_1) + ($request->L3[$i]* $request->H3[$i]*$request->price_1);
                    }
                    if($request->price_2){
                        $product_line->totalm_2 = ($request->L1[$i]*$request->H1[$i]*$request->price_2)+($request->L2[$i]* $request->H2[$i]*$request->price_2)+ ($request->L3[$i]* $request->H3[$i]*$request->price_2);
                    }
                    if($request->price_3){
                        $product_line->totalm_3 = ($request->L1[$i]*$request->H1[$i]*$request->price_3)+($request->L2[$i]* $request->H2[$i]*$request->price_3)+ ($request->L3[$i]* $request->H3[$i]*$request->price_3);
                    }
                    $product_line->m2 = ($request->L1[$i] *  $request->H1[$i]) +  ($request->L2[$i] *  $request->H2[$i]) +  ($request->L3[$i] *  $request->H3[$i]);
                    $product_line->save();

                }

            }

        }
       return redirect('admin/products');
    }

    public function productlines($id){
        $product = Product::find($id);
        $productlines = Productline::where('product_id',$id)->get();
        return view('admin.modal-productline',compact('productlines','product'));
    }


}
