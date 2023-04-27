@extends('layouts.transaction')


@section('content')

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
                            <h6>All Transaction Transactions</h6>
                            <p class="text-sm mb-0">
                            </p>
                        </div>

                        <hr class="mt-4" />
                        <h6>Filter</h6>

                        <div class="row">

                            <div class="col-lg-3 col-md-3 mb-md-0 mb-4">

                                <input type="text" id="mytable" class="form-control col-4 mb-5" data-table="table"
                                    placeholder="Search" />

                            </div>


                            <form class="col-lg-9 row" action="/transaction-search" method="POST">
                                @csrf

                                    <div class="col-lg-3 col-5">

                                        <input type="date" class="form-control form-control-lg" required name="startDate"
                                            placeholder="choose date">

                                    </div>


                                    <div class="col-lg-3 col-5">

                                        <input type="date"  class="form-control form-control-lg" required name="endDate"
                                            placeholder="choose date">

                                    </div>

                                    <button a
                                    class="btn btn-block btn-primary col-lg-4"
                                    name="submit" type="submit">Search</a></button>

                            </form>

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

                            <tbody id="geeks">

                                @forelse ($all_trasnactions as $item)
                                <tr>
                                    {{-- <td><a href="/order-details/?id={{$item->id}}">{{$item->order_id}}</a></td>
                                    --}}
                                    <td>{{$item->ref_trans_id}}</td>
                                    <td>{{$item->e_ref}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->user->first_name ?? "First Name"}} {{$item->user->last_name ?? "Last NAme"}}</td>
                                    <td>{{number_format($item->debit)}}</td>
                                    <td>{{number_format($item->credit)}}</td>
                                    <td>{{number_format($item->balance)}}</td>
                                    <td>{{number_format($item->fee)}}</td>
                                    <td>{{number_format($item->enkPay_Cashout_profit)}}</td>
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



                            {{ $all_trasnactions->onEachSide(5)->links() }}



                            <tfoot>

                                    <th colspan="1"></th>
                                    <th colspan="3"></th>
                                    <th colspan="1">{{$sum_debit}}</th>
                                    <th colspan="1">{{$sum_credit}}</th>

                            </tfoot>


                        </table>





                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">

        </div>
    </div>



    @endsection
