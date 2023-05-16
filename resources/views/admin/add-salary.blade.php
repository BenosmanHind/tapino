@extends('layouts.dashboard-admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Ajouter Un salaire</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter un salaire</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter Un salaire</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('admin/salaries')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                 <div class="form-group ">
                                    <label>Employés:</label>
                                    <select class="form-control  @error('worker') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="worker" required>
                                        @foreach($workers as $worker)
                                        <option value="{{$worker->id}}" @if (old('worker') == $worker->id) selected @endif>{{$worker->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label>Montant* :</label>
                                    <input type="text"  class="form-control input-default @error('amount') is-invalid @enderror" value="{{old('amount')}}" name="amount" placeholder="0.00" required>
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                                 <div class="form-group">
                                    <label>Remarque :</label>
                                    <input type="text"  class="form-control input-default @error('remark') is-invalid @enderror" value="{{old('remark')}}" name="remark" placeholder="..." >
                                        @error('remark')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                                 <button type="submit"  class="btn btn-primary mt-3">Ajouter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
