@extends('admin.master')
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
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
              </ol>
            </nav>
          </div>
          <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>Signup Form</h6>
              </div>
              <div class="ms-panel-body">
                <form class="needs-validation" action="{{ route('update_restaurant') }}" method="POST" enctype="multipart/form-data"  novalidate>
                  @csrf
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Restaurant Name</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="{{ $data->restaurant_name }}" name="restaurant_name" required>
                        <input type="hidden" value="{{ $data->id }}" name="id">
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                   
                  </div>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Restaurant Address</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="{{ $data->restaurant_address }}" name="restaurant_address" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                   
                  </div>

                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Restaurant Contact No</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name"name="restaurant_contact_no" value="{{ $data->restaurant_contact_no }}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>
                   
                  </div>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom03">Email Address</label>
                      <div class="input-group">
                        <input type="email" class="form-control" id="validationCustom03" placeholder="Email Address" name="email"value="{{ $data->user->email }}" required>
                        <div class="invalid-feedback">
                          Please provide a valid email.
                        </div>
                      </div>
                    </div>
                   

                      <div class="col-md-12 mb-2">
                        <label for="validationCustom04">Restaurant Image</label>
                        <div class="input-group">
                          <input type="file" name="image" placeholder="Restauran Image" accept="image/*" multiple required>
                          <div class="invalid-feedback">
                            Please provide a password.
                          </div>
                        </div>
                      </div>
                  </div>
                 
                  <button class="btn btn-primary mt-4 d-block w-100" type="submit">Update Account</button>
                </form>
               
              </div>
            </div>
          </div>

     </div>

 </div>
@endsection

