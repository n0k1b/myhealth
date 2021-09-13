@extends('owner.master')
@section('page_css')
<style>
.ms-panel-body
{
    height: 300px;
}
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

              <li class="breadcrumb-item active" aria-current="page">Report</li>
            </ol>
          </nav>


            <div class="col-md-6 offset-md-3">
                <div class="ms-panel">
                  <div class="ms-panel-header">
                    <h6>Basic Form Elements</h6>
                  </div>
                  <div class="ms-panel-body">
                    <form action="{{ route('show_all_report') }}" method="POST">
                        @csrf
                      <div class="form-group">
                        <label for="exampleEmail">Form Date</label>
                        <input id="datepicker" type="date" name="from_date" class="form-control" placeholder="From Date">
                      </div>
                      <div class="form-group">
                        <label for="examplePassword">To Date</label>
                        <input id="datepicker" type="date" name="to_date" class="form-control" placeholder="From Date">
                      </div>
                      <div class="form-group">
                        <button type="submit" style="float: right" class="btn btn-primary form-control">Submit</button>
                      </div>


                    </form>
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
    $("#datepicker").datepicker({
    maxDate: 0
});


function delete_data(id)
{
    var conf=confirm('Are you sure?');

    if(conf==true){
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'delete_expense_data/'+id,
        success: function (data) {
           alert('Content Delete Successfully')
           location.reload();

        }
    })
}
}

function expense_active_status(id)
{
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'expense_active_status_update/'+id,
        success: function (data) {


        }
    })
}
 </script>
@endsection
