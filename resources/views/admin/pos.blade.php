@extends('layouts.dashboard-admin')
@section('content')



<div class="content-body">
    <form action="{{url('/dashboard-provider/sales')}}" method="POST">
        @csrf
    <div class="container-fluid">
       
        
        <!-- row -->
        <div class="row ">

            
      
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Customer details</h4>
                    </div>
                    <div class="card-body">
                        
                        <div class="row">
                            <div class="col-3" >
                                <label for="" style="  display: block;">Client</label>
                                <select class="select-customer"  name="customer_id" class="selectpicker" data-live-search="true" style="  display: block;" required>
                                
                                    @foreach ($customers as $customer)
                                        <option  value="{{$customer->id}}"> {{ $customer->name}}</option>
                                    @endforeach
                               
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="">Credit</label>
                                <input type="text" class="form-control credit" value="0.00" readonly style="background-color: #B1B7C4; font-weight : bold;">
                            </div>
                            <div class="col-3">
                                <label for="">Total vente</label>
                                <input type="email" class="form-control total-orders"  value="0.00" readonly style="background-color: #B1B7C4; font-weight : bold;">
                            </div>
                            <div class="col-3">
                                <label>Date</label>
                                <input type="text" id="date-format" class="form-control" placeholder="{{ $time}}" data-dtp="dtp_q3nIa" disabled>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="col-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Tapis</h4>
                        <td><a href="#" class="delete-item-order"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                    </div>
                
                    <div class="card-body">
                        <div class="table-responsive " style="max-height: 300px;"> 
                            <table id="example3" class="display" >
                                <thead>
                                    <tr>
                                        <th style="width: 30%">Designation</th>
                                        <th style="width: 30%">Réf.</th>
                                        <th style="width: 30%">dimenion</th>
                                        <th style="width: 10%">Qte</th>
                                        <th style="width: 10%">Prix</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                               

                                    @foreach ($products as $product)
                                        <tr>
                                            <td><a href="#" data-id={{$product->id}}  data-price={{$product->totalm_1}} data-qte={{$product->qte()}} 
                                                data-parent="{{$product->dimension}}" data-name="{{$product->product->designation}}" class="product-select">{{$product->product->designation}}</a></td>
                                            <td>{{$product->product->reference}}</td>
                                            <td> {{$product->dimension}}</td>
                                            <td>{{$product->qte()}}</td>
                                            <td>{{$product->totalm_1}}</td>
                                        </tr>
                                  
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Details</h4>
                        
                    </div>
                
                    <div class="card-body">
                        <table class="table table-order">
                            <thead>
                              <tr>
                                <th style="width: 55%">tapis</th>
                                <th style="width: 55%">dimenion</th>
                                <th style="min-width: 70px;">Qte.</th>
                                <th style="width: 20%">Prix</th>
                              </tr>
                            </thead>
                            <tbody id="items-add">
                            </tbody>
                          </table>
                    </div>
                </div>
            </div>

            <div class="col-7">
                <div class="card">
                    <div class="card-body row">

                        <div class="col-md-6">
                            <b>Order total :</b>
                            <input type="text" id='total-price' name="total_price" class="form-control total-order total-price mt-2" value="0.00" >

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" disabled>
                                <label class="form-check-label" for="flexCheckDefault">
                                <b>Print sale invoice </b>
                                </label>
                              </div>
                        </div>

                        <div class="col-md-4">
                             <b>Change total :</b>
                            <input type="text" id='total-promo' name="total_promo" class="form-control total-price mt-2" value="0.00" >
                            <button type="button" id='ten-promo' class="btn btn-success mt-2" >-10%</button>
                            <button type="button" id='twenty-promo' class="btn btn-primary mt-2" >-20%</button>
                            <button type="button" id='reset-promo'  class="btn btn-warning mt-2" >reset</button>
                        </div>
                       
                    </div>
                </div>
            </div>

            <div class="col-5">
                <div class="card">
                    <div class="card-body ">
                            <div class="row mt-2 d-flex justify-content-center">
                                <button type="submit" class="btn btn-success btn-lg btn-block" style="width: 400px;height: 60px">Validate</button>
                            </div>
                             
                             <div class="row mt-2 d-flex justify-content-center">
                                 <a href="{{asset('/dashboard-provider/customers/create')}}">  <button type="button" class="btn btn-light mr-2" style="height: 50px">Add customer</button></a> 
                                <a href="{{asset('/dashboard-provider/sales')}}"><button type="button" class="btn btn-light mr-2 " style="height: 50px">Sales</button></a> 
                               <a href="{{asset('/dashboard-provider/global-shop')}}"> <button type="button" class="btn btn-light mr-2" style="height: 50px">Products</button></a> 
                                <a href="{{asset('/dashboard-provider/products-store')}}"> <button type="button" class="btn btn-light mr-2" style="height: 50px">Store</button></a> 
                             </div>
                          
                    </div>
                </div>
            </div>
           
        </div>
</div>
</form>  
</div>

@endsection

