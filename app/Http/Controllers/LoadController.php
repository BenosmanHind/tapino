<?php

namespace App\Http\Controllers;

use App\Models\Load;
use App\Models\Vendor;
use Illuminate\Http\Request;

class LoadController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $loads = Load::orderBy('created_at','desc')->get();
        return view('admin.loads',compact('loads'));
    }

    public function create(){
        $vendors = Vendor::all();
        return view('admin.add-load',compact('vendors'));
    }

    public function store(Request $request){
        $load = new Load();
        $load->designation = $request->designation;
        $load->vendor_id = $request->vendor;
        $load->amount = $request->amount;
        $load->save();
        return redirect('/admin/loads');
    }

    public function edit($id){
        $load = Load::find($id);
        $vendors = Vendor::all();
        return view('admin.edit-load',compact('load','vendors'));
    }

    public function update(Request $request , $id){
        $load = Load::find($id);
        $load->designation = $request->designation;
        $load->vendor_id = $request->vendor;
        $load->amount = $request->amount;
        $load->save();
        return redirect('/admin/loads');
    }

    public function destroy($id){
        $load = Load::find($id);
        $load->delete();
        return redirect('/admin/loads');
    }
}
