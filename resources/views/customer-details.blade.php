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


    @if ($customer->is_identification = "2")


    <div class="row my-1">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row mb-5">


                        <div class="mb-3">
                            <h5>Verification Details</h5>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">

                                <h6>Selfie Photo</h6>

                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="https://enkpayapp.enkwave.com/public/upload/selfie/{{$customer->image}}" alt="Card image cap">

                                  </div>

                            </div>

                            <div class="col-lg-4">

                                <h6>Identification Photo</h6>
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="https://enkpayapp.enkwave.com/public/upload/identification_image/{{$customer->identification_image}}" alt="Card image cap">

                                  </div>

                            </div>


                            <div class="col-lg-3 col-md-6 mb-md-0 mb-4 form-group">

                                <h6>Utility Bill Photo</h6>
                                <div class="card" style="width: 15rem;">
                                    <img class="card-img-top" src="https://enkpayapp.enkwave.com/public/upload/utilitybill/{{$customer->utility_bill}}" alt="Card image cap">

                                  </div>

                            </div>



                            <hr class="mt-4" />

                            <a href="/update-verification/?id={{$customer->id}}"
                                class="btn btn-block btn-primary col-lg-3 btn-lg mt-4 font-weight-medium auth-form-btn"
                                type="submit">Update Info</a></button>

                        </div>

                        </form>



                    </div>





                </div>

            </div>
        </div>

    </div>

    @endif


    <div class="row my-1">
        <div class="col-lg-12 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row mb-5">


                        <div class="mb-3">
                            <h5>Customer Details</h5>
                            <hr class="mt-4" />
                            <span>
                                <div class="row">

                                    <div class="col-lg-2">

                                        @if($customer->is_phone_verified == "1")
                                        <td><span class="badge rounded-pill bg-success ">Phone Number Verified</span>
                                        </td>
                                        @elseif($customer->is_phone_verified == "0")
                                        <td><span class="badge rounded-pill bg-warning">Phone Number Not Verified</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Phone Number Terminated</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2">

                                        @if($customer->is_email_verified == "1")
                                        <td><span class="badge rounded-pill bg-success ">Email Verified</span></td>
                                        @elseif($customer->is_email_verified == "0")
                                        <td><span class="badge rounded-pill bg-warning">Email Not Verified</span></td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Email Terminated</span></td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2">

                                        @if($customer->is_identification_verified == "1")
                                        <td><span class="badge rounded-pill bg-success ">Identity Approved</span></td>
                                        @elseif($customer->is_identification_verified == "2")
                                        <td><span class="badge rounded-pill bg-warning">Pending Identity Approval</span>
                                        </td>
                                        @elseif($customer->is_identification_verified == "0")
                                        <td><span class="badge rounded-pill bg-warning">No Identity Info</span></td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Identity Rejected</span></td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2">

                                        @if($customer->is_kyc_verified == "1")
                                        <td><span class="badge rounded-pill bg-success ">Bvn Verified</span></td>
                                        @elseif($customer->is_kyc_verified == "0")
                                        <td><span class="badge rounded-pill bg-warning">BVN Not Updated</span></td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Terminated</span></td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2">


                                        @if($customer->status == "2")
                                        <td><span class="badge rounded-pill bg-success ">Account Verified</span></td>
                                        @elseif($customer->status == "1")
                                        <td><span class="badge rounded-pill bg-warning">Pending Verification</span></td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Terminated</span></td>
                                        @endif


                                    </div>



                                </div>

                            </span>
                            <hr class="mt-4" />
                        </div>






                        <form method="POST" action="update-customer">
                            @csrf
                            <div class="row">
                                <h6>Personal Information</h6>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>First Name</label>
                                    <input class="form-control form-control-lg" name="first_name" autofocus required
                                        value="{{$customer->first_name}}">
                                </div>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Last Name</label>
                                    <input class="form-control form-control-lg" name="last_name" autofocus required
                                        value="{{$customer->last_name}}">
                                </div>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Phone</label>
                                    <input class="form-control form-control-lg" name="phone" autofocus required
                                        value="{{$customer->phone}}">
                                </div>

                                <div class="col-lg-3 col-md-6 mb-md-0 mb-4 form-group">
                                    <label> Gender </label>
                                    <select class="form-control form-control-lg" required name="gender"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$customer->gender}}">{{$customer->gender}}</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="prefer">Prefer not to say</option>

                                    </select>
                                </div>


                                <hr class="mt-4" />
                                <h6>Address Information</h6>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Address</label>
                                    <input class="form-control form-control-lg" name="address_line1" autofocus required
                                        value="{{$customer->address_line1}}">
                                </div>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>LGA</label>
                                    <input class="form-control form-control-lg" name="lga" autofocus required
                                        value="{{$customer->lga}}">
                                </div>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>State</label>
                                    <input class="form-control form-control-lg" name="state" autofocus required
                                        value="{{$customer->state}}">
                                </div>

                                <hr class="mt-4" />
                                <h6>Terminal Information</h6>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Terminal ID</label>
                                    <input class="form-control form-control-lg" name="serial_no" autofocus required
                                        value="{{$customer->serial_no}}">
                                </div>

                                <hr class="mt-4" />
                                <h6>Virtual Account Information</h6>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Virtual Account Number</label>
                                    <input class="form-control form-control-lg" name="v_account_no" autofocus required
                                        value="{{$customer->v_account_no}}">
                                </div>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Virtual Account Name</label>
                                    <input class="form-control form-control-lg" name="v_account_name" autofocus required
                                        value="{{$customer->v_account_name}}">
                                </div>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Virtual Account Bank</label>
                                    <input class="form-control form-control-lg" name="v_bank_name" autofocus required
                                        value="{{$customer->v_bank_name}}">
                                </div>


                                <hr class="mt-4" />
                                <h6>Cash Out Account Information</h6>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Cash Out Account Number</label>
                                    <input class="form-control form-control-lg" name="c_account_number" autofocus
                                        required value="{{$customer->c_account_number}}">
                                </div>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Cash Out Account Name</label>
                                    <input class="form-control form-control-lg" name="c_account_name" autofocus required
                                        value="{{$customer->c_account_name}}">
                                </div>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Cash Out Account Bank</label>
                                    <input class="form-control form-control-lg" name="c_bank_name" autofocus required
                                        value="{{$customer->c_bank_name}}">
                                </div>

                                <hr class="mt-4" />
                                <h6>Login Information</h6>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Phone Number</label>
                                    <input class="form-control form-control-lg" name="phone" autofocus required
                                        value="{{$customer->phone}}">
                                </div>

                                <div class="col-lg-3 col-md-3 mb-md-0 mb-4">
                                    <label>Email</label>
                                    <input class="form-control form-control-lg" name="email" autofocus required
                                        value="{{$customer->email}}">
                                </div>



                                <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                    <label>Password</label>
                                    <input class="form-control form-control-lg" name="password" autofocus>

                                </div>


                                <hr class="mt-4" />

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
                            <h6>Customer Transactions</h6>
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

                                @forelse ($customer_trasnactions as $item)
                                <tr>
                                    {{-- <td><a href="/order-details/?id={{$item->id}}">{{$item->order_id}}</a></td>
                                    --}}
                                    <td>{{$item->ref_trans_id}}</td>
                                    <td>{{$item->e_ref}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->user->first_name}} {{$item->user->last_name}}</td>
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



                            {{ $customer_trasnactions->onEachSide(5)->links() }}


                        </table>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">

        </div>
    </div>
    @endsection
