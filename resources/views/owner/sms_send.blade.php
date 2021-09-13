@extends('owner.master')
@section('main_content')
    <div class="ms-content-wrapper">
        @if(Session::has('success'))
  <div class="col-md-10 col-sm-10 col-10 offset-md-1 offset-sm-10 alert alert-success" >

      {{Session::get('success')}}

      </div>
  @endif
        <div class="row">
             <div class="col-md-6 offset-md-2">
          <div class="ms-panel">
            
            <div class="ms-panel-body">
              <form method="post" action="{{ route('send_sms') }}">
                  @csrf
               
              
                <div class="form-group">
                  <label for="exampleTextarea">SMS Send</label>
                  <textarea class="form-control" id="exampleTextarea" rows="4" name="msg"></textarea>
                </div>
                 <input type="submit" class="btn btn-primary d-block w-50" name="btn50" value="Send" />
              </form>
            </div>
          </div>
        </div>
            
        </div>
    </div>
@endsection 