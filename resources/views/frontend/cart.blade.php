@extends('frontend.layout.app')
@section('page_css')
<style>
    input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
    .table-content table th{
        font-size: 12px;
        text-transform: none;
    }
    .table-content table td input {
        border:none;
        background:none;
        color:none;
        width:20px;
        padding: 0px;

    }

    .button{
    -moz-user-select: none;
    -webkit-user-select: none;
    text-align:center;
    font-weight: bold;
    font-size: 18px;
    display: inline-block;
    height: 20px;
    width: 25px;
    cursor: pointer;
}
.inc{
    color: green;


}
.dec{
    color: red;
}

</style>
@endsection

@section('main_content')
<div class="cart-main-area section-padding--lg bg--white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ol-lg-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr class="title-top">
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody id="cart_data">

                            </tbody>
                        </table>
                    </div>
                </form>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 offset-lg-6">
                <div class="cartbox__total__area" id="cart_footer">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')
{{-- <script src="{{ asset('assets') }}/frontend/js/cart.js?{{ time() }}"></script> --}}
<script>
 $(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        fetch_data();



})


function fetch_data()
        {
            $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'get_cart_data',
        success: function (data) {
            var main_data = JSON.parse(data);
            $("#cart_data").html(main_data.cart_data);
            $('#cart_footer').html(main_data.cart_footer)
        }
            })
        }
        function delete_cart(id)
    {
        $.ajax({
        processData: false,
        contentType: false,
        type: 'GET',
        url: 'cart_delete/'+id,
        success: function (data) {
            fetch_data();


        }
    })
    }
</script>
@endsection
