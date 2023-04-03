@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Bonjour, Bienvenue!</h4>
                    <span>Mouvement de stock</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ asset('/admin') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Mouvement de stock</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Mouvement de stock</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="example3" class="display" >
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Produit</th>
                                    <th>Dimension</th>
                                    <th>Qte en stock</th>
                                    <th>Qte (m²) en stock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        <tbody>
                            @foreach($productlines as $productline)
                                <tr >
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$productline->product->designation}} {{$productline->product->reference}}</td>
                                    <td>{{$productline->width}} x {{ $productline->height }}</td>
                                    <td>{{$productline->qte()}}</td>
                                    <td>{{$productline->qteM2()}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <button data-id="{{$productline->id}}"class="btn btn-primary shadow btn-xs sharp mr-1 add-stock"><i class="fa fa-plus"></i></button>
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
<div id="modal-add-stock">

</div>
@endsection
@push('select-productline-scripts')
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
            url: '/get-productlines/'+id,
            type: "GET",

            success: function (res) {
                $.each(res, function(i, res) {

                data = data + '<option value="'+ res.id+ '" >'+ res.width + 'x' + res.height + '</option>';
                });

                $('#select-productlines').html(data);
                $('#select-productlines').selectpicker('refresh');
				$('#select-productlines').selectpicker('refresh');
            }
        });
    });
</script>
@endpush

@push('modal-add-stock-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".add-stock").click(function() {
  var id = $(this).data('id');
    $.ajax({
        url: '/add-stock/'+id ,
        type: "GET",
        success: function (res) {
        $('#modal-add-stock').html(res);
        $("#exampleModal2").modal('show');
        }
    });

});
</script>
@endpush
