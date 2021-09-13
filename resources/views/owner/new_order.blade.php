@extends('owner.master')
@section('page_css')
<style>
  table img{
      max-width: 64px;
     border-radius: 0%;
    margin-right: 5px;
    height: 50px;

  }
  .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}

  </style>
@endsection

@section('main_content')
<div class="ms-content-wrapper">
  @if(Session::has('success'))
  <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-success" >

      {{Session::get('success')}}

      </div>
  @endif

      <div class="row">
        <div class="col-md-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb pl-0">
              <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a>
              </li>

              <li class="breadcrumb-item active" aria-current="page">Order List</li>
            </ol>
          </nav>
          <div class="ms-panel">
            <div class="ms-panel-header">
              <button type="button" onclick="location.href='add_menu_ui'"  class="btn btn-primary" style="float: right">Add Menu</button>
              <h6>Menu List</h6>

            </div>
            <div class="modal fade" id="menu_table" tabindex="-1" role="dialog" aria-labelledby="modal-9">
                <div class="modal-dialog modal-dialog-centered modal-min" role="document">
                  <div class="modal-content">

                    <div class="modal-body text-center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                        <table class="table table-bordered thead-primary">
                            <thead>
                                <th>Menu Name</th>
                                <th>Quantity</th>
                            </thead>
                            <tbody id="order_details">

                            </tbody>
                        </table>
                    </div>

                  </div>
                </div>
              </div>

            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="data-table"  class="table w-100 thead-primary ">
                    <thead>
                        <tr>
                           <th>Table no</th>
                            <th>Customer name</th>
                            <th>View Order Menu</th>
                            <th>Total Bill</th>
                            <th>Payment Confiramtion</th>
                            <th></th>


                        </tr>
                        <tbody>
                            <?php
                            $order = $order_info;
                           ?>
                           @foreach($order as $customer_id => $order_infos)


                           <tr>
                               <td>{{ $order_infos['table_no']}}</td>
                               <td>{{ $order_infos['customer_name']}}</td>
                               <td><button class="btn btn-sm btn-primary btn-square" style="margin-top:0px" onclick="show_order_menu({{ $order_infos['customer_id'] }})" >View</button></td>
                               <td>{{ $order_infos['total'] }}</td>
                               <td><button class="btn btn-sm btn-primary btn-square" style="margin-top:0px" onclick="confirm_payment({{ $order_infos['customer_id'] }})" >Confirm</button></td>
                               <td><a href='bill_show/{{ $order_infos['customer_id'] }} ?>'><i class='fas fa-file-invoice text-secondary text-success'></i></a></td>

                             </tr>




                           @endforeach







                        </tbody>
                    </thead>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('page_js')
<script>
      $(function() {
        $('#data-table').dataTable({
            searching: true,
            paging: true,
            info: true,
            sScrollX: "100%",
            sScrollXInner: "110%",
            bJQueryUI: true,
        });


    })

function show_order_menu(customer_id)
{
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'show_order_menu/'+customer_id,
        success: function (data) {
            $("#order_details").html(data);
            $('#menu_table').modal('show');

        }
    })

}

function confirm_payment(customer_id)
{
    var conf=confirm('Are you sure?');

    if(conf==true){
        $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'confirm_payment/'+customer_id,
        success: function (data) {
        alert('Payment confirm successfully');
           location.reload();

        }
    })
}
}

function menu_active_status(id)
{
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'menu_active_status_update/'+id,
        success: function (data) {


        }
    })
}
 </script>
@endsection
