@extends('layouts.dashboard-admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Ajouter Client</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter client</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-9 col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter client</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{url('admin/customers')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nom complet*:</label>
                                    <input type="text"  class="form-control input-default "
                                        value="{{old('name')}}" name="name" placeholder="name" required >
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Téléphone*:</label>
                                    <input type="text"  class="form-control input-default "
                                        value="{{old('phone')}}" name="phone"  placeholder="+213 xx xx xx xx" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email:</label>
                                    <input type="text"  class="form-control input-default "
                                        value="{{old('email')}}" name="email" placeholder="email@gmail.com" >
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Wilaya* :</label>
                                        <select  class="form-control" class="selectpicker" data-live-search="true" name="wilaya" required>
                                            @foreach($wilayas as $wilaya)
                                            <option value="{{$wilaya->name}}">{{$wilaya->name}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Adresse:</label>
                                    <input type="text" class="form-control" value="{{old('address')}}" name="address" placeholder="Adresse" >
                                </div>
                            </div>

                            <button type="submit"  class="btn btn-primary mt-3">Ajouter</button>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
