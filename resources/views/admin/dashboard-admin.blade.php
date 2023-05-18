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
                                                <span class="text-success">Total des m²</span>
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
										<h4 class="card-title">Dernières achats professionnels</h4>
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
										<h4 class="card-title">Dernières achats clients</h4>
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
                    <div class="col-xl-4 col-xxl-4 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header border-0 pb-0">
                                <h4 class="card-title">Timeline</h4>
                            </div>
                            <div class="card-body">
                                <div id="DZ_W_TimeLine1" class="widget-timeline dz-scroll style-1" style="height:250px;">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-badge primary"></div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>10 minutes ago</span>
                                                <h6 class="mb-0">Youtube, a video-sharing website <strong class="text-primary">$500</strong>.</h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge info">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>20 minutes ago</span>
                                                <h6 class="mb-0">New order placed <strong class="text-info">#XF-2356.</strong></h6>
                                                <p class="mb-0">Quisque a consequat ante Sit...</p>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge danger">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>30 minutes ago</span>
                                                <h6 class="mb-0">john just buy your product <strong class="text-warning">Sell $250</strong></h6>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="timeline-badge success">
                                            </div>
                                            <a class="timeline-panel text-muted" href="#">
                                                <span>15 minutes ago</span>
                                                <h6 class="mb-0">StumbleUpon is acquired by eBay. </h6>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-3 col-xxl-4 col-lg-12 col-md-12">
						<div class="card bg-primary text-white">
                            <div class="card-header pb-0 border-0">
                                <h4 class="card-title text-white">TOP PRODUCTS</h4>
                            </div>
                            <div class="card-body">
                                <div class="widget-media">
                                    <ul class="timeline">
                                        <li>
                                            <div class="timeline-panel">
												<div class="media mr-2">
													<img alt="image" width="50" src="images/avatar/1.jpg">
												</div>
                                                <div class="media-body">
													<h5 class="mb-1 text-white">Dr Sultads Send You</h5>
													<small class="d-block">29 July 2021 - 02:26 PM</small>
												</div>
												<div class="dropdown">
													<button type="button" class="btn btn-primary light sharp" data-toggle="dropdown">
														<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
												<div class="media mr-2 media-info">
													KG
												</div>
												<div class="media-body">
													<h5 class="mb-1 text-white">Resport created</h5>
													<small class="d-block">29 July 2021 - 02:26 PM</small>
												</div>
												<div class="dropdown">
													<button type="button" class="btn btn-info light sharp" data-toggle="dropdown">
														<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
                                        </li>
                                        <li>
                                            <div class="timeline-panel">
                                                <div class="media mr-2 media-success">
													<i class="fa fa-home"></i>
												</div>
												<div class="media-body">
													<h5 class="mb-1 text-white">Reminder : Treatment</h5>
													<small class="d-block">29 July 2021 - 02:26 PM</small>
												</div>
												<div class="dropdown">
													<button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
														<svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"/><circle fill="#000000" cx="5" cy="12" r="2"/><circle fill="#000000" cx="12" cy="12" r="2"/><circle fill="#000000" cx="19" cy="12" r="2"/></g></svg>
													</button>
													<div class="dropdown-menu">
														<a class="dropdown-item" href="#">Edit</a>
														<a class="dropdown-item" href="#">Delete</a>
													</div>
												</div>
											</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
							<canvas id="lineChart_3Kk"></canvas>
                        </div>

						<!-- <div class="col-lg-12 col-sm-12">
                                <div class="card bg-primary">
                                    <div class="card-header border-0 pb-0">
                                        <h4 class="card-title">Dual Line Chart</h4>
                                    </div>
                                    <div class="card-body">

                                    </div>
									 <canvas id="lineChart_3Kk"></canvas>
                                </div>
                            </div> -->
					</div>
					<div class="col-xl-3 col-xxl-4 col-lg-6 col-md-6">
						<div class="card bg-info activity_overview">
                            <div class="card-header  border-0 pb-3 ">
                                <h4 class="card-title text-white">Activity</h4>
                            </div>
                            <div class="card-body pt-0">
								<div class="custom-tab-1">
                                    <ul class="nav nav-tabs mb-2">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#sale">Sale</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-toggle="tab" href="#overview">Overview</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="sale">
                                            <canvas id="chart_widget_4"></canvas>
                                        </div>
										<div class="tab-pane fade " id="overview" role="tabpanel">
                                            <div class="pt-4 text-white">
                                                <h4 class="text-white">This is home title</h4>
                                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                                </p>
                                                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
					</div>
					<div class="col-xl-3 col-xxl-4 col-lg-6 col-md-6">
						<div class="card active_users">
                            <div class="card-header bg-success border-0 pb-0">
                                <h4 class="card-title text-white">Active Users</h4>
                            </div>
							<div class="bg-success">
								<canvas id="activeUser" height="200"></canvas>
							</div>
                            <div class="card-body pt-0">
                                <div class="list-group-flush mt-4">
                                    <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1 font-weight-semi-bold border-top-0" style="border-color: rgba(255, 255, 255, 0.15)">
                                        <p class="mb-0">Top Active Pages</p>
                                        <p class="mb-0">Active Users</p>
                                    </div>
                                    <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1" style="border-color: rgba(255, 255, 255, 0.05)">
                                        <p class="mb-0">/bootstrap-themes/</p>
                                        <p class="mb-0">3</p>
                                    </div>
                                    <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1" style="border-color: rgba(255, 255, 255, 0.05)">
                                        <p class="mb-0">/tags/html5/</p>
                                        <p class="mb-0">3</p>
                                    </div>
                                    <div class="list-group-item bg-transparent d-xxl-flex justify-content-between px-0 py-1 d-none" style="border-color: rgba(255, 255, 255, 0.05)">
                                        <p class="mb-0">/</p>
                                        <p class="mb-0">2</p>
                                    </div>
                                    <div class="list-group-item bg-transparent d-xxl-flex justify-content-between px-0 py-1 d-none" style="border-color: rgba(255, 255, 255, 0.05)">
                                        <p class="mb-0">/preview/falcon/dashboard/</p>
                                        <p class="mb-0">2</p>
                                    </div>
                                    <div class="list-group-item bg-transparent d-flex justify-content-between px-0 py-1" style="border-color: rgba(255, 255, 255, 0.05)">
                                        <p class="mb-0">/100-best-themes...all-time/</p>
                                        <p class="mb-0">1</p>
                                    </div>
                                </div>
                            </div>
                        </div>
					</div>
					<div class="col-xl-6 col-xxl-12 col-lg-12 col-md-12">
						<div id="user-activity" class="card">
							<div class="card-header border-0 pb-0 d-sm-flex d-block">
								<div>
									<h4 class="card-title">History 2013 - 2021</h4>
									<p class="mb-1">Lorem Ipsum is simply dummy text of the printing</p>
								</div>
								<div class="card-action">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#user" role="tab">
												Day
											</a>
										</li>
										<!-- <li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#session" role="tab">
												Week
											</a>
										</li> -->
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#bounce" role="tab">
												Month
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#session-duration" role="tab">
												Year
											</a>
										</li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="user" role="tabpanel">
										<canvas id="activity" class="chartjs"></canvas>
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
