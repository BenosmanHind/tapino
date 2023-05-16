<?php

namespace App\Http\Controllers;

use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $vendors = Vendor::orderBy('created_at','desc')->get();
        return view('admin.vendors',compact('vendors'));
    }

    public function create(){
        return view('admin.add-vendor');
    }

    public function store(Request $request){
        $vendor = new Vendor();
        $vendor->designation = $request->designation;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->save();
        return redirect('/admin/vendors');
    }

    public function edit($id){
        $vendor = Vendor::find($id);
        return view('admin.edit-vendor',compact('vendor'));

    }

    public function update(Request $request , $id){
        $vendor = Vendor::find($id);
        $vendor->designation = $request->designation;
        $vendor->phone = $request->phone;
        $vendor->address = $request->address;
        $vendor->save();
        return redirect('/admin/vendors');
    }

    public function destroy($id){
     $vendor = Vendor::find($id);
     $vendor->delete();
     return redirect('/admin/vendors');
    }
}
