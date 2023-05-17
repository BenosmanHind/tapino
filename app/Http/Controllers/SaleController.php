<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productline;
use App\Models\Professional;
use App\Models\Sale;
use App\Models\Saleline;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Sanctum\Sanctum;

class SaleController extends Controller
{
    public function index(){
         $sales = Sale::orderByDesc('created_at')->get();
         return view('admin.sales',compact('sales'));
    }


    public function saleProOne(){
        $productlines = Productline::with('product')->get();
        $professionals = Professional::orderByDesc('created_at')->get();
        return view('admin.sale_pro_one',compact('productlines','professionals'));

    }


    public function saleProTwo(Request $request){
        $total = 0 ;
        $i = 0 ;
        $professional = Professional::find($request->professional);
        $ids = $request->product;
        $products = Productline::whereIn('id', $ids)->get();
        $qte = $request->qte;

        if($professional->price_type == 1){
            foreach($products as $product){
                $total = $total + $product->totalm_1 * $qte[$i];
                $i++;
            }
        }
        if($professional->price_type == 2){
            foreach($products as $product){
                $total = $total + $product->totalm_2 * $qte[$i];
                $i++;
            }
        }
        if($professional->price_type == 3){
            foreach($products as $product){
                $total = $total + $product->totalm_3 * $qte[$i];
                $i++;
            }
        }



        return view('admin.sale_pro_two',compact('products','qte','professional','total'));

    }

    public function proInfo($id){
        return $professional = Professional::find($id);
    }

    public function storeSale(Request $request){
       $total = 0 ;
       $i = 0 ;
       $j = 0;
       $professional = Professional::find($request->professional);
       $sale = new Sale();
       $sale->professional_id = $professional->id;
       $sale->address = $professional->address;
       $sale->wilaya = $professional->wilaya;

        $ids = $request->product;
        $products = Productline::whereIn('id', $ids)->get();
        $qte = $request->qte;
        if($professional->price_type == 1){
            foreach($products as $product){
                $total = $total + $product->totalm_1 * $qte[$i];
                $i++;
            }
        }
        if($professional->price_type == 2){
            foreach($products as $product){
                $total = $total + $product->totalm_2 * $qte[$i];
                $i++;
            }
        }
        if($professional->price_type == 3){
            foreach($products as $product){
                $total = $total + $product->totalm_3 * $qte[$i];
                $i++;
            }
        }

        $discountAmount = 0;
        $discountValue = $request->value;
        if ($request->discountType == 0) {
            $discountAmount = $discountValue;
            $sale->promo = $discountAmount;
            $sale->type_promo = $request->discountType;
            $total -= $discountAmount;
          }
        else if ($request->discountType == 1) {
            $discountAmount = ($total * $discountValue )/ 100;
            $sale->promo = $discountAmount;
            $sale->type_promo = $request->discountType;
            $total -= $discountAmount;
          }
        if($request->check_tva == 1){
            $tvaAmount = $total * 0.19; // Calculer le montant de la TVA (19%)
            $total += $tvaAmount;
            $sale->tva =  $tvaAmount;
        }


        $sale->total = $total;
        $sale->save();
        $date = Carbon::now()->format('y');
        $sale->code = 'tapino'.'-'.$date.'-'.$sale->id;
        $sale->save();
        foreach($products as $product){
            $saleline = new Saleline();
            $saleline->sale_id = $sale->id;
            $saleline->productline_id = $product->id;
            $saleline->qte = $request->qte[$j];
            if($professional->price_type == 1){
                $saleline->price = $product->totalm_1;
                $saleline->total = $request->qte[$j] * $product->totalm_1 ;
            }
            if($professional->price_type == 2){
                $saleline->price = $product->totalm_2;
                $saleline->total = $request->qte[$j] * $product->totalm_2 ;
            }
            if($professional->price_type == 3){
                $saleline->price = $product->totalm_3;
                $saleline->total = $request->qte[$j] * $product->totalm_3 ;
            }
            $stock = new Stock();
            $stock->productline_id = $product->id;
            $stock->qte = $request->qte[$j];
            $stock->qte_m2 = $request->qte[$j] * $product->m2;
            $stock->type = 'destockage';
            $stock->save();
            $saleline->save();
       }
       return redirect('admin/sales');
    }
    public function saleDetail($id){
        $sale = Sale::find($id);
        $salelines = Saleline::where('sale_id',$id)->get();
        return view('admin.detail-sale-professional',compact('sale','salelines'));
    }
}
