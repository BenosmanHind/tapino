<?php

namespace App\Http\Controllers;

use App\Models\Emplacement;
use Illuminate\Http\Request;

class EmplacementController extends Controller
{
    //
    public function index(){
        $emplacements = Emplacement::orderBy('created_at',"desc")->get();
        return view('admin.emplacements',compact('emplacements'));
    }
    public function store(Request $request){
        $emplacement = new Emplacement();
        $emplacement->code = $request->code;
        $emplacement->save();
        return redirect()->back();
    }

    public function edit($id){
        $emplacement = Emplacement::find($id);
        $emplacements = Emplacement::orderBy('created_at',"desc")->get();
        return view('admin.edit-emplacement',compact('emplacement','emplacements'));
    }
    public function update(Request $request , $id){
        $emplacement = Emplacement::find($id);
        $emplacement->code = $request->code;
        $emplacement->save();
        return redirect()->back();
    }

    public function destroy($id){
        $emplacement = Emplacement::find($id);
        $emplacement->delete();
        return redirect('admin/emplacements');
    }
}
