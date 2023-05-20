@extends('layouts.dashboard-admin')
@section('content')
<style>
    .card-body{
        padding: 20px !important;
    }
</style>
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
                <div class="row">
					<div class="col-md-9 col-lg-12">
						<div class="row">
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body pb-0 px-3 pt-2">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="mb-1">{{number_format($revenu , 2)}} Da</h3>
                                                <span class="text-success">Revenu</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body pb-0 px-3 pt-2">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="mb-1">{{$total_m2}}  m²</h3>
                                                <span class="text-success">Total vente</span>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
							<div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body pb-0 px-3 pt-2">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="mb-1">{{number_format($total_loads , 2)}} Da</h3>
                                                <span class="text-success">Total des charges</span>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>
                            <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                                <div class="card overflow-hidden">
                                    <div class="card-body pb-0 px-3 pt-2">
                                        <div class="row">
                                            <div class="col">
                                                <h3 class="mb-1">{{$total}}  m²</h3>
                                                <span class="text-success">Total de stock</span>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                            </div>


                            <div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Achats professionnels</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-responsive-sm mb-0">
												<thead>
													<tr>
														<th style="width:20px;">
															<div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="checkAll" required="">
																<label class="custom-control-label" for="checkAll"></label>
															</div>
														</th>
                                                        <th>Professionnels</th>
                                                        <th>Total</th>
                                                        <th>Date</th>
													</tr>
												</thead>
												<tbody>
                                                    @foreach($professional_sales as $professional_sale)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$professional_sale->saletable->name}}</td>
                                                        <td>{{$professional_sale->total}}</td>
                                                        <td>{{$professional_sale->created_at->format('Y-m-d H:m') }}</td>

                                                    </tr>
                                                    @endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
								<div class="card">
									<div class="card-header border-0 pb-0">
										<h4 class="card-title">Achats clients</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-responsive-sm mb-0">
												<thead>
													<tr>
														<th style="width:20px;">
															<div class="custom-control custom-checkbox checkbox-primary check-lg mr-3">
																<input type="checkbox" class="custom-control-input" id="checkAll" required="">
																<label class="custom-control-label" for="checkAll"></label>
															</div>
														</th>
                                                        <th>Client</th>
                                                        <th>Total</th>
                                                        <th>Date</th>
													</tr>
												</thead>
												<tbody>
                                                    @foreach($customer_sales as $customer_sale)
                                                    <tr>
                                                        <td>{{$loop->iteration}}</td>
                                                        <td>{{$customer_sale->saletable->name}}</td>
                                                        <td>{{$customer_sale->total}}</td>
                                                        <td>{{ $customer_sale->created_at->format('Y-m-d H:m') }}</td>
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
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

@endsection
