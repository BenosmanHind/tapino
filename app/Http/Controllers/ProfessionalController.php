<?php

namespace App\Http\Controllers;

use App\Models\Professional;
use Illuminate\Http\Request;
use TheHocineSaad\LaravelAlgereography\Models\Wilaya;

class ProfessionalController extends Controller
{
    //

    public function index(){
        $professionals = Professional::orderBy('created_at','desc')->get();
        return view('admin.professionals',compact('professionals'));
    }
    public function create(){
        $wilayas = Wilaya::all();
        return view('admin.add-professional',compact('wilayas'));
    }

    public function store(Request $request){
        $professional = new Professional();
        $professional->name = $request->name;
        $professional->entreprise = $request->entreprise;
        $professional->address = $request->address;
        $professional->email = $request->email;
        $professional->phone = $request->phone;
        $professional->fax = $request->fax;
        $professional->wilaya = $request->wilaya;
        $professional->RC = $request->RC;
        $professional->NIF = $request->NIF;
        $professional->price_type = $request->price_type;
        $professional->save();
        return redirect('admin/professionals');
    }
    public function edit($id){
        $wilayas = Wilaya::all();
        $professional = Professional::find($id);
        return view('admin.edit-professional',compact('wilayas','professional'));
    }
    public function update(Request $request ,$id){
        $professional = Professional::find($id);
        $professional->name = $request->name;
        $professional->entreprise = $request->entreprise;
        $professional->address = $request->address;
        $professional->email = $request->email;
        $professional->phone = $request->phone;
        $professional->fax = $request->fax;
        $professional->wilaya = $request->wilaya;
        $professional->RC = $request->RC;
        $professional->NIF = $request->NIF;
        $professional->price_type = $request->price_type;
        $professional->save();
        return redirect('admin/professionals');
    }
}
