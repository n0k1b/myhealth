@extends('admin.master')
@section('page_css')
<style>
  table img{
      max-width: 64px;
     border-radius: 0%; 
    margin-right: 5px;
    height: 50px;
    
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
              <li class="breadcrumb-item"><a href="#">Customer</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">Customer List</li>
            </ol>
          </nav>
          <div class="ms-panel">
            <div class="ms-panel-header">
              <button type="button" onclick="location.href='add_restaurant_ui'"  class="btn btn-primary" style="float: right">Add Restaurant</button>
              <h6>Customer List</h6>
              
            </div>

            
            <div class="ms-panel-body">
              <div class="table-responsive">
                <table id="data-table"  class="table w-100 thead-primary">
                    <thead>
                        <tr>
                          <th>Menu Image</th>
                            <th>Menu Category</th>
                            <th>Menu Name</th>
                            <th>Menu Price</th>
                            <th>Acrive Status</th>
                            <th>Action</th>
                        </tr>
                        <tbody>
                          @foreach($datas as $data)
                            <tr>
                              <td><img src="../res_photos/{{ $data->restaurant_image }}". height="100px" width="100px"></td>
                            <td>{{ $data->restaurant_name }}</td>
                            <td>{{ $data->restaurant_address }}</td>
                            <td>{{ $data->restaurant_contact_no }}</td>
                            <td>{{ $data->user->email }}</td>
                            <td><a href="edit_restaurant_ui/{{ $data->id }}"><i class="fa fa-edit"></i></a><span><a  href="javascript:void(0);" onclick="delete_data({{ $data->id }})"><i class="fa fa-trash"></i></a></span> </td>
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
        url: 'delete_res_data/'+id,
        success: function (data) {
           alert('Content Delete Successfully')
           location.reload();
            
        }
    })
}
}
 </script>
@endsection