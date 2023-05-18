@extends('layouts.dashboard-admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Modifier Client</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier client</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-9 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier client</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/customers/'.$customer->id)}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nom complet*:</label>
                                    <input type="text"  class="form-control input-default "
                                        value="{{$customer->name}}" name="name" placeholder="name" required >
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Téléphone*:</label>
                                    <input type="text"  class="form-control input-default "
                                        value="{{$customer->phone}}" name="phone"  placeholder="+213 xx xx xx xx" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email:</label>
                                    <input type="text"  class="form-control input-default "
                                        value="{{$customer->email}}" name="email" placeholder="email@gmail.com" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Wilaya* :</label>
                                        <select  class="form-control" class="selectpicker" data-live-search="true" name="wilaya" required>
                                            @foreach($wilayas as $wilaya)
                                            <option value="{{$wilaya->name}}" @if($customer->wilaya == $wilaya->name) selected @endif>{{$wilaya->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Adresse:</label>
                                    <input type="text" class="form-control" value="{{$customer->address}}" name="address" placeholder="Adresse" >
                                </div>
                            </div>

                            <button type="submit"  class="btn btn-primary mt-3">Enregistrer</button>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
