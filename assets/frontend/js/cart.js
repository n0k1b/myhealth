


function inc(product_id)
{


    updateValue(this, 1);
    $("#input_quantity").val(product_id);
   var quantity =  $("#quantity-"+product_id).val();
   //alert(quantity)
    var formdata = new FormData();
    formdata.append('id',product_id);
    formdata.append('quantity',quantity);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        url: 'cart_update',
        data:formdata,
        success: function (data) {
            fetch_data()
        }
    })


}

function dec(product_id)
{
    updateValue(this, -1);
    $("#input_quantity").val(product_id);
    var quantity =  $("#quantity-"+product_id).val();
   //alert(quantity)
    var formdata = new FormData();
    formdata.append('id',product_id);
    formdata.append('quantity',quantity);

    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        url: 'cart_update_dec',
        data:formdata,
        success: function (data) {
            fetch_data()
        }
    })


}
$(".inc").click(function() {
    updateValue(this, 1);

});
$(".dec").click(function() {
    updateValue(this, -1);
});


function updateValue(obj, delta) {
    var item = $(obj).parent().find("input[type=number]");
    var newValue = parseInt(item.val(), 10) + delta;
    item.val(Math.max(newValue, 0));
    var product_id = $('#input_quantity').val();

     $("#quantity-"+product_id).val(newValue);






}
