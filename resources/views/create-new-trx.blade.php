@extends('layouts.transaction')


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



    <div class="row my-1">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row mb-5">



                        <form method="POST" action="update-trx">
                            @csrf
                            <div class="row">
                                <h6>Add Transactions</h6>

                                <div class="col-lg-4  col-md-3 mb-md-0 mb-4">
                                    <div class="form-group">
                                        <h6>Choose Cutomers</h6>
                                        <select class="js-example-basic-single w-300" name="user_id" id=""
                                            class="form-control" required>
                                            <option value="">Select Customer</option>
                                            @foreach ($users as $data)
                                            <option value="{{ $data->id }}">{{$data->id }} - {{ $data->first_name }} {{ $data->last_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>Ref Trans ID</label>
                                    <input class="form-control form-control-lg" name="ref_trans_id" autofocus value="{{$ref_trans_id}}">
                                </div>



                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>E Rrefrence</label>
                                    <input class="form-control form-control-lg" name="e_ref" autofocus>
                                </div>


                                <div class="col-lg-2 col-md-6 mb-md-0 mb-4 form-group">
                                    <label> Transaction Type </label>
                                    <select class="form-control form-control-lg" name="transaction_type"
                                        id="exampleFormControlSelect2">
                                        <option value=" ">Select </option>
                                        <option value="FundTransfer">Fund Transfer</option>
                                        <option value="EnkPayTransfer">EnkPay Transfer</option>
                                        <option value="CashOut">Cash Out</option>
                                        <option value="VasEletric">Vas Eletric</option>
                                        <option value="VirtualFundWallet">Virtual Fund Wallet</option>
                                        <option value="CashOut">Cash Out</option>

                                    </select>

                                </div>

                                <div class="col-lg-2 col-md-6 mb-md-0 mb-4 form-group">
                                    <label> Type </label>
                                    <select class="form-control form-control-lg" name="type"
                                        id="exampleFormControlSelect2">
                                        <option value=" ">Select </option>
                                        <option value="outward">Outward</option>
                                        <option value="inAppTransfer">In App Transfer</option>
                                        <option value="FundWallet">VFD Fund Wallet</option>
                                        <option value="ProvidusFunding">Providus Funding</option>
                                        <option value="VirtualFundWallet">Virtual Fund Wallet</option>
                                        <option value="pos">POS</option>

                                    </select>

                                </div>

                                <div class="col-lg-2 col-md-6 mb-md-0 mb-4 form-group">
                                    <label> Title </label>
                                    <select class="form-control form-control-lg" name="title"
                                        id="exampleFormControlSelect2">
                                        <option value=" ">Select </option>
                                        <option value="outward">Outward</option>
                                        <option value="Bank Transfer">Bank Transfer</option>
                                        <option value="Fund Wallet">VFD Fund Wallet</option>
                                        <option value="Providus Funding">Providus Funding</option>
                                        <option value="Enkpay Transfer">Enkpay Transfer</option>
                                        <option value="POS Transaction">POS</option>

                                    </select>

                                </div>



                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>Amount</label>
                                    <input type="number" class="form-control form-control-lg" name="amount" autofocus>
                                </div>

                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>debit</label>
                                    <input type="number" class="form-control form-control-lg" name="debit" autofocus>
                                </div>

                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>Credit</label>
                                    <input type="text" class="form-control form-control-lg" name="credit" autofocus >
                                </div>



                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>Fee</label>
                                    <input type="text" class="form-control form-control-lg" name="fee" autofocus >
                                </div>

                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>ENKPay Fee</label>
                                    <input type="text" class="form-control form-control-lg" name="enkPay_Cashout_profit" autofocus >
                                </div>

                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>Note</label>
                                    <input type="text" class="form-control form-control-lg" name="note" autofocus value="EP POS | 501226XXXXXXXXX083" >
                                </div>

                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>Terminal ID</label>
                                    <input type="number" class="form-control form-control-lg" name="serial_no" autofocus >
                                </div>

                                <div class="col-lg-2 col-md-3 mb-md-0 mb-4">
                                    <label>Pin</label>
                                    <input type="password" class="form-control form-control-lg" name="pin" autofocus >
                                </div>


                                <button a
                                    class="btn btn-block btn-primary col-lg-3 btn-lg mt-4 font-weight-medium auth-form-btn"
                                    name="submit" type="submit">Update Info</a></button>

                            </div>

                        </form>



                    </div>





                </div>

            </div>
        </div>

    </div>











    @endsection
