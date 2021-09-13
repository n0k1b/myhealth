@extends('frontend.layout.app')
@section('page_css')
<style>
    .single__food__list .food__list__thumb a img{
        height: 300px;
    }
    .single__food__list .food__list__thumb
    {
        min-width: 336px;
    }
</style>
@endsection
@section('cart')
<div class="shopping__cart">
    <a class="minicart-trigger" href="#"><i class="zmdi zmdi-shopping-basket"></i></a>
    <div class="shop__qun">
        <span id="cart_itemt_count">0</span>
    </div>
</div>
@endsection
@section('main_content')
@if(Session::has('success'))
  <div class="col-md-10 col-sm-12 col-xs-12  offset-md-1 offset-sm-10 alert alert-success" >

      {{Session::get('success')}}

      </div>
  @endif
<section class="food__menu__grid__area section-padding--lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <div class="food__nav nav nav-tabs" role="tablist">
                    <a class="active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab">All</a>
                    <a  data-toggle="tab" href="#recomended" role="tab">Recomended</a>
                    <a  data-toggle="tab" href="#food_of_week" role="tab">Food Of Week</a>
                    @foreach($categories as $category)
                    <a  data-toggle="tab" href="#{{ $category->id }}" role="tab">{{ $category->category_name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row mt--30">
            <div class="col-lg-12 col-xs-12 col-sm-12">
                <div class="fd__tab__content tab-content" id="nav-tabContent">

                    <div class="food__list__tab__content tab-pane fade show" id="recomended" role="tabpanel">
                        <!-- Start Single Food -->

                        @foreach($recomended as $recomend)


                        <div class="single__food__list d-flex wow fadeInUp">
                            <div class="food__list__thumb">
                                <a href="menu-details.html">
                                    <img src="{{asset('menu_photos/')}}/{{ $recomend->image }}" alt="list food images">
                                </a>
                            </div>
                            <div class="food__list__inner d-flex align-items-center justify-content-between">
                                <div class="food__list__details">
                                    <h2><a href="menu-details.html">{{ $recomend->name }}</a></h2>
                                    <p>{{ $recomend->description }}</p>
                                    <div class="list__btn">
                                        <a class="food__btn grey--btn theme--hover" href="javascript:;" onclick="cart_add({{ $recomend->id }})">Order Now</a>
                                    </div>
                                </div>
                                <div class="food__rating">
                                    <div class="list__food__prize">
                                        <span>Tk {{ $recomend->price }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                    <div class="food__list__tab__content tab-pane fade show" id="food_of_week" role="tabpanel">
                        <!-- Start Single Food -->

                        @foreach($food_of_weeks as $recomend)


                        <div class="single__food__list d-flex wow fadeInUp">
                            <div class="food__list__thumb">
                                <a href="menu-details.html">
                                    <img src="{{asset('menu_photos/')}}/{{ $recomend->image }}" alt="list food images">
                                </a>
                            </div>
                            <div class="food__list__inner d-flex align-items-center justify-content-between">
                                <div class="food__list__details">
                                    <h2><a href="menu-details.html">{{ $recomend->name }}</a></h2>
                                    <p>{{ $recomend->description }}</p>
                                    <div class="list__btn">
                                        <a class="food__btn grey--btn theme--hover" href="javascript:;" onclick="cart_add({{ $recomend->id }})">Order Now</a>
                                    </div>
                                </div>
                                <div class="food__rating">
                                    <div class="list__food__prize">
                                        <span>Tk {{ $recomend->price }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>

                    <div class="food__list__tab__content tab-pane fade show active" id="nav-all" role="tabpanel">
                        <!-- Start Single Food -->

                        @foreach($all_foods as $all_food)


                        <div class="single__food__list d-flex wow fadeInUp">
                            <div class="food__list__thumb">
                                <a href="menu-details.html">
                                    <img src="{{asset('menu_photos/')}}/{{ $all_food->image }}" alt="list food images">
                                </a>
                            </div>
                            <div class="food__list__inner d-flex align-items-center justify-content-between">
                                <div class="food__list__details">
                                    <h2><a href="menu-details.html">{{ $all_food->name }}</a></h2>
                                    <p>{{ $all_food->description }}</p>
                                    <div class="list__btn">
                                        <a class="food__btn grey--btn theme--hover" href="javascript:;" onclick="cart_add({{ $all_food->id }})">Order Now</a>
                                    </div>
                                </div>
                                <div class="food__rating">
                                    <div class="list__food__prize">
                                        <span>Tk {{ $all_food->price }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <!-- Start Single Content -->
                    <?php
                    $data_by_category = $datas;

                    ?>
                    @foreach($data_by_category as $category_id => $datas)

                    <div class="food__list__tab__content tab-pane fade show" id="{{ $category_id }}" role="tabpanel">
                        <!-- Start Single Food -->
                        @foreach($datas as $data)


                        <div class="single__food__list d-flex wow fadeInUp">
                            <div class="food__list__thumb">
                                <a href="menu-details.html">
                                    <img src="{{asset('menu_photos/')}}/{{ $data->image }}" alt="list food images">
                                </a>
                            </div>
                            <div class="food__list__inner d-flex align-items-center justify-content-between">
                                <div class="food__list__details">
                                    <h2><a href="menu-details.html">{{ $data->name }}</a></h2>
                                    <p>{{ $data->description }}</p>
                                    <div class="list__btn">
                                        <a class="food__btn grey--btn theme--hover" href="javascript:;" onclick="cart_add({{ $data->id }})">Order Now</a>
                                    </div>
                                </div>
                                <div class="food__rating">
                                    <div class="list__food__prize">
                                        <span>Tk {{ $data->price }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>

                        @endforeach

                    </div>
                    @endforeach






                    <!-- End Single Content -->
                </div>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-lg-12">
                <ul class="food__pagination d-flex justify-content-center align-items-center mt--130">
                    <li><a href="#"><i class="zmdi zmdi-chevron-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">...</a></li>
                    <li><a href="#">7</a></li>
                    <li><a href="#"><i class="zmdi zmdi-chevron-right"></i></a></li>
                </ul>
            </div>
        </div> --}}
    </div>
</section>
@endsection
@section('cart_box')
<div class="cartbox-wrap">
    <div class="cartbox text-right">
        <button class="cartbox-close"><i class="zmdi zmdi-close"></i></button>
        <div class="cartbox__inner text-left" id="cart_box">



        </div>
    </div>
</div>
@endsection
@section('page_js')
    <script>

  $(function() {

    get_cart_count();
    get_cart_box();


    })

    function delete_cart(id)
    {
        $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'cart_delete/'+id,
        success: function (data) {
            get_cart_count();
             get_cart_box();

        }
    })
    }

    function get_cart_box()
    {

        $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_cart_box',
        success: function (data) {

            $("#cart_box").html(data);
        }
    })
    }
    function get_cart_count()
    {
        $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_cart_count',
        success: function (data) {

            $("#cart_itemt_count").text(data);
        }
    })
    }
    function cart_add(id)
    {
        $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'cart_add/'+id,
        success: function (data) {
            get_cart_count();
             get_cart_box();

        }
    })
    }

    </script>
@endsection
