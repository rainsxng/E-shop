function increaseByOne(product_id)
{
    let quantity = $('#quantity2').val();
    $('#quantity2').val(quantity+1);
    // $.ajax({
    //     url: '/cart/increase',
    //     type: "POST",
    //     data: "productId="+product_id,
    //     dataType: "text",
    //     error: function(){
    //         alert("Ошибка");
    //     },
    //     success: success
    // });
}
function decreaseByOne(product_id)
{
    let quantity = $('#quantity2').val();
    $('#quantity2').val(quantity-1);
    // $.ajax({
    //     url: '/cart/deleteOne',
    //     type: "POST",
    //     data: "productId="+product_id,
    //     dataType: "text",
    //     error: function(){
    //         alert("Ошибка");
    //     },
    //     success: success
    // });
}