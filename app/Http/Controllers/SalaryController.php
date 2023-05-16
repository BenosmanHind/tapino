<?php

namespace App\Http\Controllers;

use App\Models\Salary;
use App\Models\Worker;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $salaries = Salary::orderBy('created_at','desc')->get();
        return view('admin.salaries',compact('salaries'));
    }
    public function create(){
        $workers = Worker::orderBy('created_at','desc')->get();
        return view('admin.add-salary',compact('workers'));
    }

    public function store(Request $request){
        $salary = new Salary();
        $salary->worker_id = $request->worker;
        $salary->amount = $request->amount;
        $salary->remark = $request->remark;
        $salary->save();
        return redirect('admin/salaries');
    }

    public function edit($id){
        $salary = Salary::find($id);
        $workers = Worker::all();
        return view('admin.edit-salary',compact('salary','workers'));
    }

    public function update(Request $request , $id){
        $salary = Salary::find($id);
        $salary->worker_id = $request->worker;
        $salary->amount = $request->amount;
        $salary->remark = $request->remark;
        $salary->save();
        return redirect('admin/salaries');
    }

    public function destroy($id){
       $salary = Salary::find($id);
       $salary->delete();
       return redirect('admin/salaries');
    }
}
