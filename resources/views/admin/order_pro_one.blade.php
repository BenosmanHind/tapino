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
        <div class="row ">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ajouter vente</h4>
                    </div>
                    <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <select name="professional" id="select-pro" title="selectionner un client..."  data-live-search="true"  class="selectpicker form-control">
                                            <option value="1">client</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                       <a href="#" class="btn btn-primary btn-sm"> Ajouter client </a>
                                    </div>
                                    <div class="form-group col-md-4">
                                       <b> Information sur le client :</b> <br>
                                       <span> entreprise</span> ,  <span> prix 1</span>
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
                        <h4 class="card-title">Détails de commande </h4>
                    </div>

                    <div class="card-body " id="variation" >
                       <div class="basic-form d-flex justify-content-center" >
                            <div class="col-md-8">
                                <table id="tblattribute" class="table table-bordered mt-3 ">
                                    <thead>
                                        <tr>
                                            <th scope="col">Produit - réf - dimension </th>
                                            <th scope="col">Qte</th>
                                            <th scope="col">#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dynamicAddRemove" >
                                            <tr>
                                                <td style="width: 30%">
                                                    <div class="input-group">
                                                        <select name="product" id="select-product" title="produit..."  data-size="5" data-live-search="true"  class="selectpicker form-control">
                                                            @foreach ($productlines as $line)
                                                              <option value="{{$line->id}}">{{$line->product->designation }}  &nbsp;&nbsp;   {{$line->product->reference}} &nbsp;&nbsp;  {{$line->dimension}} </option>
                                                            @endforeach
                                                        </select>
                                                        
                                                    </div>
                                                </td>
                                               
                                                <td  style="width: 10%">
                                                    <div class="input-group">
                                                       <input type="number" value="1" class="form-control" name='qte[]'>
                                                    </div>
                                                </td >
                                                    
                                                <td style="width: 5%">
                                                    <button type="button" id="add-attribute" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
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
                    <button type="submit" class="btn btn-primary mt-3">Voir Détails</button>
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
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
    });


	$("#select-product").change(function() {

		var id = $(this).val();
		var data ="";

		$.ajax({
			url: '/get-dimension/' + id,
			type: "GET",

			success: function (res) {

				$.each(res, function(i, res) {
				data = data + '<option value="'+ res.id+ '" >'+ res.value + '</option>';
				});

				$('#select-value').html(data);
				$('#select-value').niceSelect('update');
				$('#select-value').niceSelect('update');

			}
		});

	});
</script>


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
    $("#add-attribute").click(function () {
        ++i;
        $html = '<tr class="tradded">'+
                 '<td style="width: 30%">'+
                    '<div class="input-group">'+
                       ' <select name="product" id="select-product" title="produit..."  data-live-search="true"  class="selectpicker form-control">'+
                            '@foreach ($productlines as $line)'+
                                '<option value="{{$line->id}}">{{$line->product->designation }}  &nbsp;&nbsp;   {{$line->product->reference}} &nbsp;&nbsp;  {{$line->dimension}} </option>'+
                            '@endforeach'+
                        '</select>'+
                    '</div>'+
                '</td>'+
                
               ' <td  style="width: 10%">'+
                    '<div class="input-group">'+
                        '<input type="number" value="1" class="form-control" name="qte[]">'+
                    '</div>'+
                '</td >'+
                    '<td>'+
                       ' <button type="button" class="btn btn-danger shadow btn-xs sharp delete-attribute"><i class="fa fa-trash"></i></button>'+
                    '</td>'+
                '</tr>'

        $("#dynamicAddRemove").append($html);
        $(document).on('click', '.delete-attribute', function () {
        $(this).parents('tr').remove();
        });
    });
</script>




@endpush


