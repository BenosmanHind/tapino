@extends('layouts.dashboard-admin')

@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Valider la commande</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Ajouter vente</a></li>
                </ol>
            </div>
        </div>
       <form action="{{url('admin/store-sale')}}" method="POST"  enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Détails de l'achat </h4>
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
                                 <input type="hidden" value="{{ $product->id }}" name="product[]">
                                 <input type="hidden" value="{{ $qte[$loop->iteration - 1]}}" name="qte[]">
                               @endforeach

                               <tr>
                                    <td colspan="5" style="text-align:right;"><b>Total</b> </td>
                                    <td > <b >{{ number_format($total, 2) }}  Da</b> </td>

                                </tr>
                               <tr>
                                    <td colspan="5" style="text-align:right;"><b>Remise</b> </td>
                                    <td class="remise" > <b > 0 Da</b> </td>

                                </tr>

                                <tr>
                                    <td colspan="5" style="text-align:right;"><b>TVA (19%) : </b> </td>
                                    <td class="tva">  0 Da</td>
                                </tr>

                                <tr>
                                    <td colspan="5" style="text-align:right;"><b>Total :</b> </td>
                                    <td > <b class="total-amount" data-total = {{ $total }} style="font-size: 17px">{{ number_format($total, 2) }}  Da</b> </td>
                                </tr>

                            </tbody>

                        </table>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Remise </label>
                                    <select class="form-control" id="discount-type">
                                      <option>Sans remise</option>
                                      <option value="0">Fixe</option>
                                      <option value="1">pourcentage</option>
                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""> valeur</label>
                                    <input type="texte" class="form-control discount-value" id="exampleFormControlInput1" placeholder="name@example.com">
                                  </div>
                            </div>
                            <div class="col-md-3 mt-4">
                                <div class="form-check">
                                    <input class="form-check-input tva-checkbox" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label" for="defaultCheck1">
                                      Tva 19%
                                    </label>
                                  </div>
                            </div>
                            <div class="col-md-3 ">
                            <button type="button" class="btn btn-success mt-3 calculate-total">Calculer le total</button>
                            <div class="col-md-3 mt-4">
                        </div>


                        <input type="hidden" value="{{ $professional->id }}"name="professional">

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-success mt-3">Valider la commande</button>
                    </form>
                </div>
               </div>
            </div>
        </div>
        </form>
    </div>
</div>

@endsection


@push('calculate-totla-script')

<script>

      // Fonction pour recalculer le total en fonction de la remise et de la TVA
      function recalculateTotal() {
        var total = $(".total-amount").data('total'); // Récupérer le montant total initial

        // Vérifier si une remise est appliquée et obtenir le type et la valeur de la remise
        var discountType = $("#discount-type").val();
        var discountValue =$(".discount-value").val();

        // Calculer le montant de la remise en fonction du type
        var discountAmount = 0;
        if (discountType == 0) {
          discountAmount = discountValue;
        } else if (discountType == 1) {
          discountAmount = (total * discountValue )/ 100;
        }

        // Appliquer la remise au montant total
        total -= discountAmount;

        // Vérifier si la TVA est sélectionnée
        if ($(".tva-checkbox").is(":checked")) {
          var tvaAmount = total * 0.19; // Calculer le montant de la TVA (19%)
          total += tvaAmount;
        }

        // Mettre à jour le montant total affiché
        $(".total-amount").text((total).toLocaleString(undefined, { minimumFractionDigits: 2 }) + " Da");
            // Mettre à jour la valeur de la remise affichée
        $(".remise").text(discountAmount + " Da");

        // Mettre à jour la valeur de la TVA affichée
        if ($(".tva-checkbox").is(":checked")) {
         $(".tva").text(tvaAmount + " Da");
        }
        else{

            $(".tva").text("0 Da");
        }
      }

      // Écouter les événements de modification de la remise et de la TVA
      $(".calculate-total").click(function() {
        recalculateTotal();
      });



    </script>

@endpush

