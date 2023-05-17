@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Professionals</a></li>
            </ol>
        </div>

        <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Professionals</h4>
                        <a href="{{url('/admin/professionals/create')}}" type="button"  class="btn btn-primary mt-3">Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nom complet</th>
                                        <th>Entreprise</th>
                                        <th>Téléphone</th>
                                        <th>Email</th>
                                        <th>Fax</th>
                                        <th>Wilaya</th>
                                        <th>Adresse</th>
                                        <th>NIF</th>
                                        <th>RC</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($professionals as $professional)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$professional->name}}</td>
                                        <td>{{$professional->entreprise}}</td>
                                        <td>{{$professional->phone}}</td>
                                        <td>{{$professional->email}}</td>
                                        <td>{{$professional->fax}}</td>
                                        <td>{{$professional->wilaya}}</td>
                                        <td>{{$professional->address}}</td>
                                        <td>{{$professional->NIF}}</td>
                                        <td>{{$professional->RC}}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{url('admin/professionals/'.$professional->id.'/edit')}}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{url('admin/professionals/'.$professional->id)}}" method="post">
                                                    {{csrf_field()}}
                                                    {{method_field('DELETE')}}
                                                    <button class="btn btn-danger shadow btn-xs sharp" onclick="return confirm('Vous voulez vraiment supprimer?')"><i class="fa fa-trash"></i></button>
                                               </form>
                                            </div>
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
