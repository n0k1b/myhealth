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
                <li class="breadcrumb-item"><a href="#">salary</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit salary</li>
              </ol>
            </nav>
          </div>
          <div class="col-xl-12 col-md-12">
            <div class="ms-panel">
              <div class="ms-panel-header">
                <h6>Edit salary</h6>
              </div>
              <div class="ms-panel-body">
                <form class="needs-validation" action="{{ route('update_salary') }}" method="POST" enctype="multipart/form-data"  novalidate>
                  @csrf


                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Name</label>
                      <div class="input-group">
                          <input type="hidden" name='id' value="{{$data->id }}">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="expense_name" value="{{ $data->expense_name }}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Amount</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="expense_amount" value="{{ $data->expense_amount }}" required>
                        <div class="valid-feedback">
                          Looks good!
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="form-row">
                    <div class="col-md-12 mb-3">
                      <label for="validationCustom01">Description</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="validationCustom01" placeholder="First name" name="expense_note" value="{{ $data->expense_note }}" required>
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
