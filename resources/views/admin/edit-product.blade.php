@extends('layouts.dashboard-admin')
@section('content')
<style>
    .symb-calcul{
        padding: 6px;
        background-color:  #EBEEF6;
        border: 1px solid #dddddd;
        font-weight: bold;
    }
</style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, bienvenue!</h4>
                    <span>Modifier Produit</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Modifier produit</a></li>
                </ol>
            </div>
        </div>
       <form action="{{url('admin/products/'.$product->id)}}" method="POST" id="addProduct" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="row ">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Modifier produit</h4>
                    </div>
                    <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Désignation*:</label>
                                        <input type="text"  class="form-control input-default "
                                          value="{{$product->designation}}" name="designation" id="designation" placeholder="designation" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Désignation 2(optionnel):</label>
                                        <input type="text"  class="form-control input-default "
                                          value="{{$product->designation_2}}" name="designation_2" placeholder="designation" >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Référence*:</label>
                                        <input type="text"  class="form-control input-default "
                                          value="{{$product->reference}}" name="reference" id="reference" placeholder="reference" >
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Catégories* :</label>
                                            <select  id="select-content-individuel"  class="default-select form-control wide selectpicker" name="category" >
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{$category->designation}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Emplacement :</label>
                                            <select  id="select-content-individuel"  class="default-select form-control wide selectpicker" name="emplacement" >
                                                <option value="Dépôt"> Dépôt</option>
                                                @foreach($emplacements as $empalcement)
                                                <option value="{{$empalcement->code}}" @if($product->emplacement == $emplacement->code) selected @endif>{{$empalcement->code}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Qte alert:</label>
                                        <input type="number"  class="form-control input-default control-number " value="{{$product->qte_alert}}" min="0" name="qte_alert" placeholder="0">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Prix 1 (m²) *:</label>
                                        <input type="text" class="form-control input-default control-number" value="{{$product->pricem_1}}" name="price_1" placeholder="0.00">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Prix 2 (optionnel):</label>
                                        <input type="text" class="form-control input-default control-number" value="{{$product->pricem_2}}" name="price_2" placeholder="0.00">

                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Prix 3 (optionnel):</label>
                                        <input type="text" class="form-control input-default control-number" value="{{$product->pricem_3}}" name="price_3" placeholder="0.00">
                                    </div>
                                </div>
                        </div>
                </div>
            </div>
     </div>
     <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Dimensions </h4>
                </div>

                <div class="card-body " id="variation" >
                   <div class="basic-form d-flex justify-content-center" >
                        <div class="col-md-8">
                            <table id="tblattribute" class="table table-bordered mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Dimension</th>
                                        <th scope="col">#</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamicAddRemove">
                                    @foreach($productlines as $productline)
                                        @php
                                            $valeur = $productline->dimension;
                                            $valeur = str_replace(['(', ')'], '', $valeur);
                                            $segments = explode('+', $valeur);
                                        @endphp
                                        <tr  class="tradded">
                                            <td style="width: 60%">
                                                <div class="input-group">
                                                    @foreach($segments as $index => $segment)
                                                        @php
                                                            $dimensions = explode('x', $segment);
                                                            $largeur = isset($dimensions[0]) ? $dimensions[0] : '';
                                                            $hauteur = isset($dimensions[1]) ? $dimensions[1] : '';
                                                        @endphp
                                                        <input type="text" class="form-control" value="{{ $largeur }}" placeholder="L" name="L{{ $index + 1 }}[]">
                                                        <span class="symb-calcul">X</span>
                                                        <input type="text" class="form-control mr-4" value="{{ $hauteur }}" placeholder="H" name="H{{ $index + 1 }}[]">
                                                        @if (!$loop->last)
                                                            <span class="symb-calcul mr-4">+</span>
                                                        @endif
                                                   @endforeach
                                                </div>
                                            </td>
                                            @if($loop->first)
                                            <td style="width: 10%">
                                                <button type="button"  class="btn btn-primary shadow btn-xs sharp mr-1 add-product"><i class="fa fa-plus"></i></button>
                                                <button type="button" class="btn btn-danger shadow btn-xs sharp delete-product"><i class="fa fa-trash"></i></button>
                                            </td>
                                            @else
                                            <td>
                                                <button type="button" class="btn btn-danger shadow btn-xs sharp delete-product"><i class="fa fa-trash"></i></button>
                                             </td>
                                            @endif

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

        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                <div class="card-body text-center">
                    <button type="submit" class="btn btn-primary mt-3">Enregistrer</button>
                    </form>
                </div>
               </div>
            </div>
        </div>
        </form>
    </div>
</div>

<div id="modal-add-attribute">
</div>

@endsection

@push('show-dimensions-scripts')

<script>
    $(document).ready(function() {
        $("#addProduct").validate({
            rules: {
                designation: "required",
                'categories[]': {
                    required: true,
                    maxlength: 1
                 },
                 price_1: "required"

            },
            messages: {
                designation: {
                    required: "La designation est obligatoire",
                },
                price_1: {
                    required: "Le prix est obligatoire",
                },
                'categories[]': {
                    required: "Selectionnez une categorie",
                 },
            },
        });
    });
 </script>

<script>

   $( "#check" ).prop( "checked", false );
   $("#check").on('change',function(){

    if(this.checked) {
        $("#variation").css("display", "block");
        $("#select-content").prop('required',true);
    }
    else{
        $("#select-content").prop('required',false);
        $("#variation").css("display", "none");
        $('.tradded').remove();
        }
    });

 </script>
@endpush

@push('add-dimension-scripts')
<script type="text/javascript">
    var i = 0;
    $(".add-product").click(function () {
        ++i;
        $html = '<tr class="tradded">'+
                   '<td style="width: 60%">'+
                        '<div class="input-group">'+
                            '<input type="text" class="form-control" placeholder="L" name="L1[]">'+
                            '<span class="symb-calcul">X</span>'+
                            '<input type="text" class="form-control mr-4" placeholder="H" name="H1[]">'+
                            ' <span class="symb-calcul mr-4">+</span>'+
                            '<input type="text" class="form-control" placeholder="L" name="L2[]">'+
                            '<span class="symb-calcul">X</span>'+
                           ' <input type="text" class="form-control mr-4" placeholder="H" name="H2[]">'+
                            '<span class="symb-calcul mr-4">+</span>'+
                            '<input type="text" class="form-control" placeholder="L" name="L3[]">'+
                            '<span class="symb-calcul">X</span>'+
                            '<input type="text" class="form-control" placeholder="H" name="H3[]">'+
                       ' </div>'+
                   '</td>'+

                    '<td>'+
                       ' <button type="button" class="btn btn-danger shadow btn-xs sharp delete-product"><i class="fa fa-trash"></i></button>'+
                    '</td>'+
                '</tr>'

        $("#dynamicAddRemove").append($html);
        $(document).on('click', '.delete-product', function () {

        $(this).parents('tr').remove();
        });
    });
    $(document).on('click', '.delete-product', function () {

        $(this).parents('tr').remove();
        });
</script>


@endpush



