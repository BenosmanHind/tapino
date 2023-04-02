@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Catégories</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Catégories</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier catégorie</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form action="{{url('/admin/categories/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                 @csrf
                                <div class="form-group">
                                    <label>Désignation* :</label>
                                    <input type="text" class="form-control input-default " name="designation" value="{{ $category->designation }}" required>
                                </div>
                                <button type="submit"  class="btn btn-primary mt-3">Enregistrer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Catégories</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example3" class="display" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Désignation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr >
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->designation}}</td>
                                    <td>
                                        <form action="{{url('admin/categories/'.$category->id)}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                        <div class="d-flex">
                                            <a href="{{url('admin/categories/'.$category->id.'/edit')}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <button class="  btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                        </div>
                                        </form>
                                    </td>
                                 </tr>
                             @endforeach
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
