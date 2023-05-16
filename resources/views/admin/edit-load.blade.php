@extends('layouts.dashboard-admin')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Modifier Une Charge</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier une charge</a></li>
                </ol>
            </div>
        </div>
        <div class="row ">
            <div class="col-xl-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier Une Charge</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('admin/loads/'.$load->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                @csrf
                               <div class="form-group">
                                    <label>Désignation* :</label>
                                    <input type="text"  class="form-control input-default @error('designation') is-invalid @enderror" value="{{$load->designation}}" name="designation" required>
                                        @error('designation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                 <div class="form-group ">
                                    <label>Fournisseur:</label>
                                    <select class="form-control  @error('vendor') is-invalid @enderror" id="sel1"  class="selectpicker" data-live-search="true" name="vendor">
                                        @foreach($vendors as $vendor)
                                        <option value="{{$vendor->id}}" @if ($load->vendor_id == $vendor->id) selected @endif>{{$vendor->designation}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                  <div class="form-group">
                                    <label>Montant* :</label>
                                    <input type="text"  class="form-control input-default @error('amount') is-invalid @enderror" value="{{$load->amount}}" name="amount" required>
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                 </div>
                                 <button type="submit"  class="btn btn-primary mt-3">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
