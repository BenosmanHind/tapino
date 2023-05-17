<?php

namespace App\Http\Controllers;

use App\Models\Productline;
use App\Models\Professional;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(){
        $time = Carbon::now();
        $products = Productline::get();
        $customers = Professional::get()->reverse();
        return view('admin.pos',compact('customers','products','time'));
    }

}
