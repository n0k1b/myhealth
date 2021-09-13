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

              <li class="breadcrumb-item active" aria-current="page">Menu List</li>
            </ol>
          </nav>
          <div class="ms-panel">
            <div class="ms-panel-header">
              <button type="button" onclick="location.href='add_menu_ui'"  class="btn btn-primary" style="float: right">Add Menu</button>
              <h6>Menu List</h6>

            </div>


            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="data-table"  class="table w-100 thead-primary">
                    <thead>
                        <tr>
                           <th>Menu Image</th>
                            <th>Menu Category</th>
                            <th>Menu Name</th>
                            <th>Description</th>
                            <th>Menu Price</th>
                            <th>Active Status</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                          @foreach($datas as $data)
                          <?php
								$checked = $data->active_status=='1'?'checked':'';
							?>
                            <tr>
                              <td><img src="../menu_photos/{{ $data->image }}". height="100px" width="100px"></td>
                              <td>{{ $data->category->category_name }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->description }}</td>
                            <td>{{ $data->price }}</td>
                            <td><label class="switch">
                                <input type="checkbox"  onclick="menu_active_status({{$data->id}})" {{$checked}}>
                                    <span class="slider round"></span>
                                </label></td>
                            <td><a href="edit_menu_ui/{{ $data->id }}"><i class="fa fa-edit"></i></a><span><a  href="javascript:void(0);" onclick="delete_data({{ $data->id }})"><i class="fa fa-trash"></i></a></span> </td>
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


function delete_data(id)
{
    var conf=confirm('Are you sure?');

    if(conf==true){
    $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'delete_menu_data/'+id,
        success: function (data) {
           alert('Content Delete Successfully')
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
