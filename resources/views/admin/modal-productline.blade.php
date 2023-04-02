<div class="modal fade" id="exampleModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $product->designation }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="basic-form">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Largeur</th>
                                <th scope="col">Hauteur</th>
                                <th scope="col">Total 1</th>
                                <th scope="col">Total 2</th>
                                <th scope="col">Total 3</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($productlines as $productline)
                              <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $productline->width }}</td>
                                <td>{{ $productline->height }}</td>
                                <td>@if($productline->totalm_1){{ number_format($productline->totalm_1,2) }} Da @else <i class="fas fa-minus"></i>@endif</td>
                                <td>@if($productline->totalm_2){{ number_format($productline->totalm_2,2) }} Da @else <i class="fas fa-minus"></i>@endif</td>
                                <td>@if($productline->totalm_3){{ number_format($productline->totalm_3,2) }} Da  @else <i class="fas fa-minus"></i>@endif</td>
                              </tr>
                            @endforeach
                            </tbody>
                          </table>
                      </div>

                 </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>

            </div>
        </div>
    </div>
</div>
