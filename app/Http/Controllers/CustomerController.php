<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use TheHocineSaad\LaravelAlgereography\Models\Wilaya;

class CustomerController extends Controller
{
    //
    public function index(){
        $customers = Customer::orderBy('created_at','desc')->get();
        return view('admin.customers',compact('customers'));
    }
    public function create(){
        $wilayas = Wilaya::all();
        return view('admin.add-customer',compact('wilayas'));
    }

    public function store(Request $request){
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->wilaya = $request->wilaya;
        $customer->address = $request->address;
        $customer->save();
        return redirect('admin/customers');
    }
    public function edit($id){
        $customer = Customer::find($id);
        $wilayas = Wilaya::all();
        return view('admin.edit-customer',compact('customer','wilayas'));
    }

    public function update(Request $request , $id){
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->wilaya = $request->wilaya;
        $customer->address = $request->address;
        $customer->save();
        return redirect('admin/customers');
    }
    public function destroy($id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('admin/customers');
    }
}
