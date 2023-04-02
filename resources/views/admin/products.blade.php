@extends('layouts.dashboard-admin')
@section('content')

<div class="content-body">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{ url('/admin') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Produits</a></li>
            </ol>
        </div>

        <div class="row">
        <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Produits</h4>
                        <a href="{{url('/admin/products/create')}}" type="button"  class="btn btn-primary mt-3">Ajouter</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example3" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Désignation</th>
                                        <th>Catégorie</th>
                                        <th>Emplacement</th>
                                        <th>Prix 1</th>
                                        <th>Prix 2</th>
                                        <th>Prix 3</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$product->designation}}</td>
                                        <td>{{$product->category->designation}}</td>
                                        <td>{{$product->emplacement}}</td>
                                        <td>@if($product->pricem_1){{number_format($product->pricem_1)}} Da @else<i class="fas fa-minus"></i> @endif</td>
                                        <td>@if($product->pricem_2){{number_format($product->pricem_2)}} Da @else<i class="fas fa-minus"></i> @endif</td>
                                        <td>@if($product->pricem_3){{number_format($product->pricem_3)}} Da @else<i class="fas fa-minus"></i> @endif</td>
                                        <td>
                                            <div class="d-flex">
                                                <button data-id="{{$product->id}}"class="btn btn-primary shadow btn-xs sharp mr-1 show-productlines"><i class="fas fa-eye"></i></button>
                                                <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fas fa-pencil-alt"></i></a>
                                                <form action="{{url('admin/products/'.$product->id)}}" method="post">
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
<div id="modal-productlines">

</div>
@endsection
@push('modal-productlines-scripts')
<script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(".show-productlines").click(function() {
  var id = $(this).data('id');
    $.ajax({
        url: '/productlines/'+id ,
        type: "GET",
        success: function (res) {
        $('#modal-productlines').html(res);
        $("#exampleModal").modal('show');
        }
    });

});
</script>
@endpush
