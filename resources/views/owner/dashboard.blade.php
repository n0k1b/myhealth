@extends('owner.master')
@section('main_content')
    <div class="ms-content-wrapper">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">

                  <div class="ms-card-body media">
                    <div class="media-body">
                      <span class="black-text"><strong>Total User</strong></span>
                      <h2>{{ $total_user }}</h2>
                    </div>
                  </div>
                  <canvas id="line-chart"></canvas>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">

                  <div class="ms-card-body media">
                    <div class="media-body">
                      <span class="black-text"><strong>Total Subscriber</strong></span>
                      <h2>{{ $total_subscriber }}</h2>
                    </div>
                  </div>
                  <canvas id="line-chart-2"></canvas>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">

                  <div class="ms-card-body media">
                    <div class="media-body">
                      <span class="black-text"><strong>Total Unsubscriber</strong></span>
                      <h2>{{ $total_unsubscriber }}</h2>
                    </div>
                  </div>
                  <canvas id="line-chart-3"></canvas>
                </div>
              </div>

              <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">

                  <div class="ms-card-body media">
                    <div class="media-body">
                      <span class="black-text"><strong>Total Other Operator</strong></span>
                      <h2>{{ $total_other_operator }}</h2>
                    </div>
                  </div>
                  <canvas id="line-chart-4"></canvas>
                </div>
              </div>
              
              <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">

                  <div class="ms-card-body media">
                    <div class="media-body">
                      <span class="black-text"><strong>Total Temporary Block</strong></span>
                      <h2>{{ $total_temporary_block }}</h2>
                    </div>
                  </div>
                  <canvas id="line-chart-4"></canvas>
                </div>
              </div>
              
               <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">

                  <div class="ms-card-body media">
                    <div class="media-body">
                      <span class="black-text"><strong>Total Error User</strong></span>
                      <h2>{{ $total_error_user }}</h2>
                    </div>
                  </div>
                  <canvas id="line-chart-4"></canvas>
                </div>
              </div>
              
              <div class="col-xl-3 col-lg-6 col-md-6">
                <div class="ms-card ms-widget has-graph-full-width ms-infographics-widget">

                  <div class="ms-card-body media">
                    <div class="media-body">
                      <span class="black-text"><strong>Total Pending Charge</strong></span>
                      <h2>{{ $pending_charge }}</h2>
                    </div>
                  </div>
                  <canvas id="line-chart-4"></canvas>
                </div>
              </div>




        </div>
    </div>
@endsection
