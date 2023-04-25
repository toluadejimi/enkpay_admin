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

                                    <div class="col-lg-2">

                                        @if($features->pos ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">POS Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">POS Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2">

                                        @if($features->bank_transfer ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Bank Transfer Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Bank Transfer Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2">

                                        @if($features->bills ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Bills Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Bills Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2">

                                        @if($features->data ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Data Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Data Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2">



                                        @if($features->airtime ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Airtime Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Airtime Inactive</span>
                                        </td>
                                        @endif


                                    </div>


                                    <div class="col-lg-2">


                                        @if($features->insurance ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Insurance Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Insurance Inactive</span>
                                        </td>
                                        @endif

                                    </div>


                                    <div class="col-lg-2">


                                        @if($features->education ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Education Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Education Inactive</span>
                                        </td>
                                        @endif

                                    </div>


                                    <div class="col-lg-2">


                                        @if($features->power ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Power Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Power Inactive</span>
                                        </td>
                                        @endif

                                    </div>

                                    <div class="col-lg-2">


                                        @if($features->exchange ?? null == "1")
                                        <td><span class="badge rounded-pill bg-success ">Exchange Active</span>
                                        </td>
                                        @else
                                        <td><span class="badge rounded-pill bg-danger">Exchange Inactive</span>
                                        </td>
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



                                <hr class="mt-4" />
                                <h6>Terminal Information</h6>



                                <div class="col-lg-3">
                                        <input data-id="{{$features->id}}" class="toggle-class" type="checkbox"
                                            name="t_status" data-onstyle="success" data-offstyle="danger"
                                            data-toggle="toggle" data-on="POS" data-off="POS" {{
                                            $features->pos ? 'checked' : '' }}>

                                </div>


                                <div class="col-lg-3">
                                        <input data-id="{{$features->id}}" class="bank" type="checkbox"
                                            name="t_status" data-onstyle="success" data-offstyle="danger"
                                            data-toggle="toggle" data-on="BANK" data-off="BANK" {{
                                            $features->bank_transfer ? 'checked' : '' }}>

                                </div>

                                <div class="col-lg-3">
                                    <input data-id="{{$features->id}}" class="bills" type="checkbox"
                                        name="t_status" data-onstyle="success" data-offstyle="danger"
                                        data-toggle="toggle" data-on="POS" data-off="POS" {{
                                        $features->pos ? 'checked' : '' }}>

                            </div>


                            <div class="col-lg-3">
                                    <input data-id="{{$features->id}}" class="data" type="checkbox"
                                        name="t_status" data-onstyle="success" data-offstyle="danger"
                                        data-toggle="toggle" data-on="DATA" data-off="DATA" {{
                                        $features->data ? 'checked' : '' }}>

                            </div>






                                <hr class="mt-4" />
                                <h6>Cash Out Account Information</h6>


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
