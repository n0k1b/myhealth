@extends('owner.master')
@section('main_content')
 <div class="ms-content-wrapper">


    @if ($errors->any())
            <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-danger" >
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
     @endif
     <div class="row">
        <div class="col-md-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb pl-0">
                <li class="breadcrumb-item"><a href="#"><i class="material-icons">home</i> Home</a></li>
                <li class="breadcrumb-item"><a href="#">Menu</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Menu</li>
              </ol>
            </nav>
          </div>
          <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>Edit Menu</h6>
              </div>
              <div class="ms-panel-body">
                <form class="needs-validation" action="{{ route('update_menu') }}" method="POST" enctype="multipart/form-data"  novalidate>
                  @csrf

                  <div class="form-group">
                    <label for="exampleSelect">Select Menu Category</label>
                    <select class="form-control" id="exampleSelect" name = 'category_id'>
                        @foreach($categories as $category)
                      <option value="{{$category->id}}">{{ $category->category_name }}</option>
                      @endforeach

                    </select>
                  </div>

                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Menu Name</label>
                      <div class="input-group">
                          <input type="hidden" name='id' value="{{$data->id }}">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="name" value="{{ $data->name }}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Menu Price</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="price" value="{{ $data->price }}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Menu Description</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="description" value="{{ $data->description }}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Menu Image</label>
                      <div class="input-group">
                        <input type="file" name="image" placeholder="Restauran Image" accept="image/*" multiple>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>

                  </div>




                  <button class="btn btn-primary mt-4 d-block w-100" type="submit">Update</button>
                </form>

              </div>
            </div>
          </div>

     </div>

 </div>
@endsection
