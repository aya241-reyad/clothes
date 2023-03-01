@extends('dashboard.master')
@section('title')
    order page
@endsection
@section('content')
    <section class="mt-3 content">
        <div class="container">
            <div class="row">
                <div class="col-12">


                    <div class="card shadow-none">
                        <!-- Main content -->
                        <div class=" invoice p-3 shadow rounded-4">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> {{ __('dashboard.gomlatak') }}.
                                        <small class="float-end">{{ date('Y-m-d') }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 invoice-col">
                              <h5>{{ __('dashboard.orderid') }}: {{ $order->id }}</h5>
                          </div>
                         
                   <div class="col-sm-4 invoice-col float-end">
                            <h5>{{ __('dashboard.governorate') }}: {{ $order->client->governorate->name }}</h5>
                        </div>
                          <div class="col-sm-4 invoice-col">
                            <h5>{{ __('dashboard.name') }}: {{ $order->first_name . $order->last_name }}</h5>
                        </div>
                         <div class="col-sm-4 invoice-col float-end">
                            <h5>{{ __('dashboard.city') }}: {{$order->city }}</h5>
                        </div>
                         <div class="col-sm-4 invoice-col">
                            <h5>{{ __('dashboard.email') }}: {{ $order->email }}</h5>
                        </div>
                        <div class="col-sm-4 invoice-col float-end">
                            <h5>{{ __('dashboard.address') }}: {{$order->address }}</h5>
                        </div>
                       
                        
                             <div class="col-sm-4 invoice-col">
                            <h5>{{ __('dashboard.companyname') }}: {{ $order->company_name }}</h5>
                        </div>
                        
                        <div class="col-sm-4 invoice-col float-end">
                            <h5>{{ __('dashboard.countrystate') }}: {{ $order->country_state }}</h5>
                        </div>
                         <div class="col-sm-4 invoice-col ">
                            <h5>{{ __('dashboard.phone') }}: {{ $order->phone }}</h5>
                        </div>


                     
                      <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        
<div class=" invoice p-3 shadow rounded-4 mt-3">
                            <div class="row">
                           
                                <div class="col-1">
                          <h5>{{ __('dashboard.notes') }}:</h5>
                                </div>
                     <div class="col-11 invoice-col">
                            <h5>{{ $order->notes }}</h5>
                   </div>
                            </div>
                        </div>
                      
                        <div class="row justify-content-end my-4 mx-3">
                          <div class="col-6">
                            <h4>{{ __('dashboard.products') }}:</h4>
                             <div class="table-responsive shadow border">

                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">{{ __('dashboard.name') }}</th>
                                            <th style="width:50%">{{ __('dashboard.color') }}</th>
                                            <th style="width:50%">{{ __('dashboard.size') }}</th>
                                             <th style="width:50%">{{ __('dashboard.quantity') }}</th>
                                        </tr>
                                         @foreach($items as $item)
                                          <tr>
                                            <th>{{$item->product->title}}</th>
                                            <th style="width:50%">{{$item->product->productColors[0]->color->name}}</th>
                                            <th style="width:50%">{{$item->product->productSizes[0]->size->size}}</th>
                                            <th>{{$item->quantity}}</th>
                                        </tr>
                                        @endforeach
                                    </table>

                                </div>
                        

                          </div>
                            <div class="col-6">
                                <h4>{{ __('dashboard.ordertotal') }}:</h4>
                                <div class="table-responsive shadow border">

                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">{{ __('dashboard.subtotal') }}:</th>
                                            <td>{{ $order->sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ __('dashboard.total') }}</th>
                                            <td>{{ $order->total }}</td>

                                        </tr>

                                    </table>

                                </div>
                               
                            </div>
                        </div>
                        <div class="">
                          <a href="{{ url('generate-pdf/' . $order->id) }} "class="btn btn-primary mx-auto my-2 d-block w-25"> <i class="fas fa-download"></i> Generate PDF</a>
                      </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
