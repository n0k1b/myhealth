@extends('frontend.layout.app')
@section('main_content')
<section class="htc__checkout bg--white section-padding--lg">
    <!-- Checkout Section Start-->
    <div class="checkout-section">
        <div class="container">
            <div class="row">

                <form action="{{ route('order_place') }}" method="POST" class="checkout-login-form">
                    @csrf
                <div class="col-lg-6 col-12 col-xs-12 col-sm-12 mb-30">

                        <!-- Checkout Accordion Start -->
                        <div id="checkout-accordion">

                            <!-- Checkout Method -->



                                <div id="checkout-method" class="collapse show">
                                    <div class="checkout-method accordion-body fix">



                                            <div class="row">
                                                <div class="input-box col-md-6 col-12 mb--20"><input type="text" name='customer_name' placeholder="Your Name"></div>
                                                <div class="input-box col-md-6 col-12 mb--20"><input type="text" name='customer_contact_no' placeholder="Your Contact No"></div>

                                            </div>


                                    </div>
                                </div>







                        </div><!-- Checkout Accordion Start -->
                    </div>

                    <!-- Order Details -->
                    <div class="col-lg-6 col-xs-12 col-sm-12 col-12 mb-30">

                        <div class="order-details-wrapper">
                            <h2>your order</h2>
                            <div class="order-details">

                                    <ul>
                                        <li><p class="strong">Product</p><p class="strong">Price</p></li>
                                        @foreach($cart as $id => $details)
                                        <li><p>{{ $details['name'] }} x{{ $details['quantity'] }}</p><p>Tk {{ $details['price'] }}</p></li>
                                        @endforeach

                                        <li><p class="strong">Order Total</p><p class="strong">Tk {{ $total }}</p></li>
                                        <li><button class="food__btn">place order</button></li>
                                    </ul>

                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div><!-- Checkout Section End-->
 </section>
@endsection
