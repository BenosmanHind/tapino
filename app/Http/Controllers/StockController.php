<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Productline;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    //
    public function index(){
        $productlines = Productline::orderBy('created_at','desc')->get();
        return view('admin.stock',compact('productlines'));
    }
    public function getProductlines($id){
        $productlines = Productline::where('product_id',$id)->get();
        return $productlines;
    }
    public function store(Request $request){
        $product = Product::find($request->product);
        $productline = Productline::find($request->productline);
        $stock = new Stock();
        $stock->productline_id = $request->productline;
        $stock->type = $request->type;
        if($request->type_qte == 'pcs'){
            $stock->qte_m2 = $request->qte * $productline->m2;
            $stock->qte = $request->qte;
        }
        else{
            $qte = $request->qte / $productline->m2;
            $stock->qte = intVal($qte);
            $stock->qte_m2 = $request->qte;
        }
        $stock->save();
        return redirect()->back();
    }

    public function modalAddStock($id){
        $productline = Productline::find($id);
        $qte_m2_stockage = Stock::where('productline_id',$id)->where('type','stockage')->sum('qte_m2');
        $qte_m2_destockage = Stock::where('productline_id',$id)->where('type','destockage')->sum('qte_m2');
        $qte_m2 = $qte_m2_stockage - $qte_m2_destockage;

        $qte_stockage = Stock::where('productline_id',$id)->where('type','stockage')->sum('qte');
        $qte_destockage = Stock::where('productline_id',$id)->where('type','destockage')->sum('qte');
        $qte = $qte_stockage - $qte_destockage;
        return view('admin.modal-add-stock',compact('productline','qte_m2','qte'));
    }
}
