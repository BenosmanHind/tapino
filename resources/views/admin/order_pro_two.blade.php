@extends('layouts.dashboard-admin')

@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Ajouter une vente</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter vente</a></li>
                </ol>
            </div>
        </div>
       <form action="{{url('admin/products')}}" method="POST" id="addProduct" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détails de la commande </h4>
                    </div>

                    <div class="card-body " id="variation" >

                        <table class="table  table-striped">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">produit</th>
                                <th scope="col">dimenison</th>
                                <th scope="col">P.U</th>
                                <th scope="col">Qte.</th>
                                <th scope="col">total</th>
                              </tr>
                            </thead>
                            <tbody>
                                
                               @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$product->product->designation}}</td>
                                    <td>{{$product->dimension}}</td>
                                    <td>
                                        @if($professional->price_type == "1")
                                          {{$product->totalm_1}}
                                        @elseif($professional->price_type == "2")
                                          {{$product->totalm_2}}
                                        @elseif($professional->price_type == "3")
                                          {{$product->totalm_3}}
                                        @endif 
                                    </td>
                                    <td>{{$qte[$loop->iteration - 1]}}</td>
                                    <td>
                                        @if($professional->price_type == "1")
                                        {{$qte[$loop->iteration - 1] * $product->totalm_1}}
                                        @elseif($professional->price_type == "2")
                                        {{$qte[$loop->iteration - 1] * $product->totalm_2}}
                                        @elseif($professional->price_type == "3")
                                        {{$qte[$loop->iteration - 1] * $product->totalm_3}}
                                        @endif 
                                    </td>
                                </tr>
                                   
                               @endforeach 

                               <tr>
                                    <td colspan="4" style="text-align:right;"><b>Total</b> </td>
                                    <td > <b >{{ number_format($order->total, 2) }}  Da</b> </td>

                                </tr>

                                <tr>
                                    <td colspan="4" style="text-align:right;"><b>Livraison</b> </td>
                                    <td >  0 Da</td>
                                </tr>

                                <tr>
                                    <td colspan="4" style="text-align:right;"><b>Total</b> </td>
                                    <td > <b style="font-size: 17px">{{ number_format($order->total, 2) }}  Da</b> </td>
                                </tr>
                              
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-success mt-3">Valider la commande </button>
                    </form>
                </div>
               </div>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection




