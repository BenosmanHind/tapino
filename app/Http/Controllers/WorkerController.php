<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $workers = Worker::orderBy('created_at','desc')->get();
        return view('admin.workers',compact('workers'));
    }
    public function create(){
        return view('admin.add-worker');
    }

    public function store(Request $request){
        $worker = new Worker();
        $worker->name = $request->name;
        $worker->phone = $request->phone;
        $worker->email = $request->email;
        $worker->date_birth = $request->date_birth;
        $worker->job = $request->job;
        $worker->save();
        return redirect('admin/workers');

    }
    public function edit($id){
        $worker = Worker::find($id);
        return view('admin.edit-worker',compact('worker'));
    }

    public function update(Request $request , $id){
        $worker = Worker::find($id);
        $worker->name = $request->name;
        $worker->phone = $request->phone;
        $worker->email = $request->email;
        $worker->date_birth = $request->date_birth;
        $worker->job = $request->job;
        $worker->save();
        return redirect('admin/workers');

    }

    public function destroy($id){
     $worker = Worker::find($id);
     $worker->delete();
     return redirect('admin/workers');
    }
}
