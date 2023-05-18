<?php

namespace App\Http\Controllers;

use App\Models\Load;
use App\Models\Sale;
use App\Models\Saleline;
use App\Models\Stock;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(){
        $professional_sales = Sale::where('saletable_type','App\Models\Professional')->orderByDesc('created_at')->get();
        $customer_sales = Sale::where('saletable_type','App\Models\Customer')->orderByDesc('created_at')->get();
        $total_loads = Load::sum('amount');
        $total_m2 = Saleline::join('productlines', 'salelines.productline_id', '=', 'productlines.id')
                                        ->selectRaw('SUM(productlines.m2 * salelines.qte) as total_m2')
                                        ->value('total_m2');
        $revenu = Sale::sum('total_f');

        $total_stock = Stock::where('type','stockage')->sum('qte_m2');
        $total_destockage = Stock::where('type','destockage')->sum('qte_m2');
        $total =  $total_stock - $total_destockage;
        return view('admin.dashboard-admin',compact('professional_sales','customer_sales','total_loads','total_m2','revenu','total'));
    }
}
