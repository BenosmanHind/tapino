@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Commandes</a></li>
            </ol>
        </div>

        <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Commandes</h4>
                        <a href="{{url('admin/order-pro-one')}}" type="button"  class="btn btn-primary mt-3">Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Professionnels</th>
                                        <th>Wilaya</th>
                                        <th>Adresse</th>
                                        <th>Total</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sales as $sale)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sale->professional->name}}</td>
                                        <td>{{$sale->wilaya}}</td>
                                        <td>{{$sale->address}}</td>
                                        <td>{{$sale->total}}</td>
                                        <td>{{ $sale->created_at->format('Y-m-d H:m') }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{asset('admin/sale-detail/'.$sale->id) }}" class="btn btn-success shadow btn-xs sharp mr-1"><i class="fas fa-eye"></i></a>
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fas fa-pencil-alt"></i></a>

                                                <form action="" method="post">
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
