@extends('layouts.customers')

@section('content')
    <div class="container-fluid py-4">
        <div class="col-6 w-100">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
        <div class="row mb-3">







        <div class="row mt-3">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Business Customers</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{number_format($business_customers)}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-chart-bar-32 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Agent Customers</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{number_format($agent_customers)}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">App Customer</p>
                                    <h5 class="font-weight-bolder mb-0">

                                        {{number_format($app_customer)}}

                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>









        <div class="row mt-4">
            <div class="col-lg-5 mb-lg-0 mb-4">

            </div>

        </div>
        <div class="row my-4">
            <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        
                        <a><button class="btn btn-primary mr-1"  href="submit">Submit</button></a>

                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>List of Customers</h6>
                                <p class="text-sm mb-0">
                                </p>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">

                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>

                                    <tr>
                                        <th>Customer Name</th>
                                        <th>Phone</th>
                                        <th>State</th>
                                        <th>Gender</th>
                                        <th>Banalce NGN</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>

                                <tbody>


                                    @forelse ($customers as $item)


                                    <tr>
                                      <td><a href="/order-details/?id={{$item->id}}">{{$item->first_name ?? 'name'}} {{$item->last_name ?? "name"}}</a></td>
                                      <td>{{$item->phone}}</td>
                                      <td>{{$item->state}}</td>
                                      <td>{{$item->gender}}</td>
                                      <td>{{number_format($item->main_wallet)}}</td>
                                      @if($item->status == "2")
                                      <td><span class="badge rounded-pill bg-success ">Verfied</span></td>
                                      @elseif($item->status == "1")
                                      <td><span class="badge rounded-pill bg-warning">Pending</span></td>
                                      @else
                                    @endif


                                    </tr>
                                    @empty
                                    <tr colspan="20" class="text-center">No Record Found</tr>
                                    @endforelse


                                </tbody>

                                {{ $customers->onEachSide(5)->links() }}


                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">

            </div>
        </div>
    @endsection
