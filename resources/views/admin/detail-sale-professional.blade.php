@extends('layouts.dashboard-admin')

@section('content')


<div class="content-body">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div class="d-flex align-items-center flex-wrap text-nowrap">
              <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0  printMe">
                <i class="btn-icon-prepend " data-feather="printer"></i>
                Imprimer
              </button>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détail vente </h4>s
                    </div>

                    <div class="card-body print-section" id="printable">
                        <div class="d-flex justify-content-between" >
                            <div >
                                <img src="{{asset('dashboard/images/logo-report.png')}}"> <br>
                                <p> <b>Site Web :</b>  www.tapino.com <br>
                                      <b>  Tél :</b> 0560 09 90 33
                                    </p>

                            </div>

                            <div class="infos-client" style="width: 350px;">
                                <h3 >Bon de livraison N° {{ $sale->code }}</h3> <br>
                                <p ><b> Nom :</b> {{$sale->saletable->name}}<br>
                                <b> Tél: </b> {{$sale->saletable->phone}}  <br>
                                <b> Adresse:</b> {{$sale->address}} <br>
                                 <b> Wilaya:</b>  {{ucfirst($sale->wilaya)}}<br>
                                Date: {{$sale->created_at->format('Y-m-d')}} </p><br>
                            </div>

                        </div>
                        <table class="table table-striped">
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

                               @foreach ($salelines as $saleline)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$saleline->productline->product->designation}}</td>
                                    <td>{{$saleline->productline->dimension}}</td>
                                    <td>{{$saleline->price}}</td>
                                    <td>{{$saleline->qte}}</td>
                                    <td>{{number_format($saleline->total)}}</td>
                                </tr>

                               @endforeach

                               <tr>
                                    <td colspan="5" style="text-align:right;"><b>Total</b> </td>
                                    <td > <b >{{ number_format($sale->total, 2) }}  Da</b> </td>

                                </tr>
                                @if($sale->promo)
                                <tr>
                                    <td colspan="5" style="text-align:right;"><b>Remise</b> </td>
                                    <td >  {{ $sale->promo }} Da</td>
                                </tr>
                                @endif
                                @if($sale->tva)
                                <tr>
                                    <td colspan="5" style="text-align:right;"><b>TVA (19%)</b> </td>
                                    <td >  {{ $sale->tva }} Da</td>
                                </tr>
                                @endif
                                @if(($sale->promo != NULL || $sale->tva != NULL) || ($sale->promo != NULL && $sale->tva != NULL))
                                <tr>
                                    <td colspan="5" style="text-align:right;"><b>Total</b> </td>
                                    <td > <b style="font-size: 17px">{{ number_format($sale->total_f, 2) }}  Da</b> </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection

@push('order-detail-scripts')
<script>
    $('.printMe').click(function(){
        $('#printable').printThis();
    });
    </script>
@endpush


