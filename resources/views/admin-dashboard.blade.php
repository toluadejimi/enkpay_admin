@extends('layouts.admindashboard')

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
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">

                    <div class="card-body p-3">
                        <div class="row">

                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Money IN</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        NGN {{number_format($total_money_in), 2}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-bold-up text-lg opacity-10" aria-hidden="true"></i>
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Money Out</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        NGN {{number_format($total_money_out), 2}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-bold-down text-lg opacity-10" aria-hidden="true"></i>
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total on Pool</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        NGN {{$pool_total}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-circle-08 diploma text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Errand Profit</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{number_format($errand_profit)}}
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
        </div>


        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Money In Today</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        NGN{{number_format($total_money_in_today)}}
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Money Out Today</p>
                                    <h5 class="font-weight-bolder mb-0">
                                        NGN{{number_format($total_money_out_today)}}
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
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Profit on POS</p>
                                    <h5 class="font-weight-bolder mb-0">

                                        NGN{{number_format($total_profit_pos)}}

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
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Profit on VAS</p>
                                    <h5 class="font-weight-bolder mb-0">

                                        NGN{{number_format($total_profit_vas)}}



                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


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
            <div class="col-xl-3 col-sm-6">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Pending Order</p>
                                    <h5 class="font-weight-bolder mb-0">

                                        {{number_format($total_orders)}}


                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                    <i class="ni ni-archive-2 text-lg opacity-10" aria-hidden="true"></i>
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
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h6>Latest Transactions</h6>
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
                                        <th>Trx ID</th>
                                        <th>E REF</th>
                                        <th>Title</th>
                                        <th>Customer</th>
                                        <th>Debit</th>
                                        <th>Credit</th>
                                        <th>Balance</th>
                                        <th>E Fee</th>
                                        <th>Profit</th>
                                        <th>Terminal No</th>
                                        <th>Sender Name</th>
                                        <th>Sender Account</th>
                                        <th>Sender Bank</th>
                                        <th>Receiver Name</th>
                                        <th>Receiver Account</th>


                                        <th>Status</th>
                                        <th>Date</th>

                                        <th>Time</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @forelse ($latest_transactions as $item)
                                    <tr>
                                      {{-- <td><a href="/order-details/?id={{$item->id}}">{{$item->order_id}}</a></td> --}}
                                      <td>{{$item->ref_trans_id}}</td>
                                      <td>{{$item->e_ref}}</td>
                                      <td>{{$item->title}}</td>

                                      <td>{{$item->user->first_name}} {{$item->user->last_name}}</td>
                                      <td>{{$item->debit}}</td>
                                      <td>{{$item->credit}}</td>
                                      <td>{{$item->balance}}</td>
                                      <td>{{$item->fee}}</td>
                                      <td>{{$item->enkPay_Cashout_profit}}</td>
                                      <td>{{$item->serial_no}}</td>
                                      <td>{{$item->sender_name}}</td>
                                      <td>{{$item->sender_account_no}}</td>
                                      <td>{{$item->sender_bank}}</td>
                                      <td>{{$item->receiver_name}}</td>
                                      <td>{{$item->receiver_account_no}}</td>







                                      @if($item->status == "1")
                                      <td><span class="badge rounded-pill bg-success ">Successful</span></td>
                                      @elseif($item->status == "0")
                                      <td><span class="badge rounded-pill bg-warning">Pending</span></td>
                                      @else
                                      <td><span class="badge rounded-pill bg-danger">Declined</span></td>
                                      @endif
                                      <td>{{date('F d, Y', strtotime($item->created_at))}}</td>
                                      <td>{{date('h:i:s A', strtotime($item->created_at))}}</td>

                                    </tr>
                                    @empty
                                    <tr colspan="20" class="text-center">No Record Found</tr>
                                    @endforelse


                                </tbody>

                                {{ $latest_transactions->onEachSide(5)->links() }}


                            </table>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">

            </div>
        </div>
    @endsection
