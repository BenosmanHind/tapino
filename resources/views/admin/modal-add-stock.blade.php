<div class="modal fade" id="exampleModal2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">{{ $productline->product->designation }} {{ $productline->product->reference }} - {{ $productline->width }} x {{ $productline->height }}</h6>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <form action="{{url('admin/stocks')}}" method="POST" id="addProduct" enctype="multipart/form-data">
                @csrf
            <div class="modal-body">
                <div class="card-body">
                    <div class="basic-form">
                        <p>Qte actuelle en m² : <b>{{ $qte_m2 }}</b></p>
                        <p>Qte actuelle en pcs. : <b>{{ $qte }}</b></p>
                        <div class="form-row ">
                            <div class="form-group col-md-12">
                            <label>Type* :</label>
                                <select type="text"  class="form-control input-default" name="type" class="selectpicker" data-live-search="true" required>
                                    <option value="stockage">Stockage</option>
                                    <option value="destockage">Déstockage</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                            <label>Qte unité* :</label>
                                <select type="text"  class="form-control input-default"  class="selectpicker" data-live-search="true" name="type_qte" required>
                                    <option value="m2">m²</option>
                                    <option value="pcs">pcs.</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Qte* :</label>
                                <input type="text"  class="form-control invalid" name="qte" placeholder="0">
                            </div>
                            <input type="hidden"  class="form-control invalid" name="productline" value="{{ $productline->id }}">
                        </div>
                    </div>
                 </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger light" data-dismiss="modal">Fermer</button>
                <button type="submit" id="submitFinalRegistration" class="btn btn-primary">Ajouter</button>
            </div>
            </form>
        </div>
    </div>
</div>

