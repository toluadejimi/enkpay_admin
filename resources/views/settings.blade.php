@extends('layouts.settings')


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


                        <div class="mb-3">
                            <h5>Features Status</h5>
                            <hr class="mt-4" />
                            <span>
                                <div class="row">

                                    <div class="col-lg-2 mb-2">

                                        @if($features->pos ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">POS Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">POS Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2 mb-2">

                                        @if($features->bank_transfer ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Bank Transfer Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Bank Transfer Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2 mb-2">

                                        @if($features->bills ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Bills Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Bills Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2 mb-2">

                                        @if($features->data ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Data Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Data Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2 mb-2">



                                        @if($features->airtime ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Airtime Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Airtime Inactive</span>
                                        </td>
                                        @endif


                                    </div>


                                    <div class="col-lg-2 mb-2">


                                        @if($features->insurance ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Insurance Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Insurance Inactive</span>
                                        </td>
                                        @endif

                                    </div>


                                    <div class="col-lg-2 mb-2">


                                        @if($features->education ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Education Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Education Inactive</span>
                                        </td>
                                        @endif

                                    </div>


                                    <div class="col-lg-2 mb-2">


                                        @if($features->power ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Power Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Power Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2 mb-2">


                                        @if($features->exchange ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Exchange Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Exchange Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2 mb-2">


                                        @if($features->ticket ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Ticket Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Ticket Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2 mb-2">


                                        @if($features->v_card ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">V Card Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">V Card Inactive</span>
                                        </td>
                                        @endif

                                    </div>



                                </div>

                            </span>
                            <hr class="mt-4" />
                        </div>






                        <form method="POST" action="update-features">
                            @csrf
                            <div class="row">
                                {{-- <h6>System Settings</h6>

                                <hr class="mt-4" /> --}}
                                <h6>Features Settings</h6>



                                <div class="col-lg-2 mb-3">
                                    <span>POS</span>
                                    <select class="form-control form-control-lg" name="pos"
                                        id="exampleFormControlSelect2" data-onstyle="success" data-offstyle="danger">

                                        <option value="{{$features->pos}}">
                                            @if ($features->pos == 1)
                                            POS Active
                                            @else
                                            POS Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>


                                <div class="col-lg-2 mb-3">
                                    <span>Bank Transfer</span>
                                    <select class="form-control form-control-lg" name="bank_transfer"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->bank_transfer}}">
                                            @if ($features->bank_transfer == 1)
                                            Transfer Active
                                            @else
                                            Transfer Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>

                                <div class="col-lg-2 mb-3">
                                    <span>Bills</span>
                                    <select class="form-control form-control-lg" name="bills"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->bills}}">
                                            @if ($features->bills == 1)
                                            Transfer Active
                                            @else
                                            Transfer Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>

                                <div class="col-lg-2 mb-3">
                                    <span>Data</span>
                                    <select class="form-control form-control-lg" name="data"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->data}}">
                                            @if ($features->data == 1)
                                            Data Active
                                            @else
                                            Data Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>

                                <div class="col-lg-2 mb-3">
                                    <span>Airtime</span>
                                    <select class="form-control form-control-lg" name="airtime"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->airtime}}">
                                            @if ($features->airtime == 1)
                                            Airtime Active
                                            @else
                                            Airtime Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>


                                <div class="col-lg-2 mb-3">
                                    <span>Insurance</span>
                                    <select class="form-control form-control-lg" name="insurance"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->insurance}}">
                                            @if ($features->insurance == 1)
                                            Insurance Active
                                            @else
                                            Insurance Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>

                                <div class="col-lg-2 mb-3">
                                    <span>Education</span>
                                    <select class="form-control form-control-lg" name="education"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->education}}">
                                            @if ($features->education == 1)
                                            Education Active
                                            @else
                                            Education Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>


                                <div class="col-lg-2 mb-3">
                                    <span>Power</span>
                                    <select class="form-control form-control-lg" name="power"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->power}}">
                                            @if ($features->power == 1)
                                            Power Active
                                            @else
                                            Power Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>


                                <div class="col-lg-2 mb-3">
                                    <span>Exchnage</span>
                                    <select class="form-control form-control-lg" name="exchange"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->exchange}}">
                                            @if ($features->exchnage == 1)
                                            Exchange Active
                                            @else
                                            Exchange Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>

                                <div class="col-lg-2 mb-3">
                                    <span>Ticket</span>
                                    <select class="form-control form-control-lg" name="ticket"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->ticket}}">
                                            @if ($features->ticket == 1)
                                            Ticket Active
                                            @else
                                            Ticket Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>

                                <div class="col-lg-2 mb-3">
                                    <span>Virtual Cards</span>
                                    <select class="form-control form-control-lg" name="v_card"
                                        id="exampleFormControlSelect2">

                                        <option value="{{$features->v_card}}">
                                            @if ($features->v_cards == 1)
                                            V Card Active
                                            @else
                                            V Card Inactive
                                            @endif
                                        </option>
                                        <option value="1">Active</option>
                                        <option value="0">Incative</option>

                                    </select>

                                </div>




                            </div>

                            <div class="col-lg-6 mb-3">

                                <button a
                                    class="btn btn-block btn-primary col-lg-5 btn-lg mt-4 font-weight-medium auth-form-btn"
                                    name="submit" type="submit">Update</a></button>

                            </div>


                        </form>






                        <hr class="mt-4" />
                        <h6>Play and App Store Settings</h6>



                        <form method="POST" action="update-store">
                            @csrf
                            <div class="row">


                                <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                    <label>Version</label>
                                    <input class="form-control form-control-lg" name="version" autofocus value="{{$settings->version}}">

                                </div>

                                <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                    <label>Play Store Link</label>
                                    <input class="form-control form-control-lg" name="playstore_link" autofocus value="{{$settings->google_url}}">

                                </div>

                                <div class="col-lg-3 col-md-6 mb-md-0 mb-4">
                                    <label>App Store Link</label>
                                    <input class="form-control form-control-lg" name="appstore_link" autofocus value="{{$settings->ios_url}}">

                                </div>



                                <div class="col-lg-6 mb-3">

                                    <button a
                                        class="btn btn-block btn-primary col-lg-5 btn-lg mt-4 font-weight-medium auth-form-btn"
                                        name="submit" type="submit">Update</a></button>

                                </div>
                            </div>

                        </form>




                        <hr class="mt-4" />
                        <h6>Login Information</h6>



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

    <script>
        $(function() {
              $('.toggle-class').change(function() {
                  var status = $(this).prop('checked') == true ? 1 : 0;
                  var feature_id = $(this).data('id');

                  $.ajax({
                      type: "GET",
                      dataType: "json",
                      url: '/changeposstatus',
                      data: {'status': status, 'feature_id': feature_id},
                      success: function(data){
                        console.log(data.success),
                        location.reload()
                      }
                  });
              })
            })
    </script>

    <script>
        $(function() {
          $('.data').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0;
          var feature_id = $(this).data('id');

          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changedatastatus',
              data: {'status': status, 'feature_id': feature_id},
              success: function(data){
                console.log(data.success),
                location.reload()
              }
          });
      })
    })
    </script>
</div>






@endsection
