function DeleteOneFromCart(product_id)
{
    $.ajax({
        url: '/cart/deleteOne',
        type: "POST",
        data: "productId="+product_id,
        dataType: "text",
        error: function(){
           alert("Ошибка");
        },
        success: success
    });
}
function DeleteAllFromCart()
{
    $.ajax({
        url: '/cart/deleteAll',
        type: "POST",
        dataType: "text",
        error: function(){
            alert("Ошибка");
        },
        success: success
    });
}
function success()
{
    setTimeout(function () {// wait for 1 secs(2)
        location.reload(); // then reload the page.(3)
    }, 1);
}
function increaseByOne(product_id)
{
    let quantity = $('#quantity'+product_id).text();
    $('#quantity'+product_id).text(+quantity+1);
    $.ajax({
        url: '/cart/increase',
        type: "POST",
        data: "productId="+product_id,
        dataType: "text",
        error: function(){
            alert("Ошибка");
        },
        success: success()
    });
}
function decreaseByOne(product_id)
{
    let quantity = $('#quantity'+product_id).text();
    $('#quantity'+product_id).text(+quantity-1);
    if (quantity<=1)  DeleteOneFromCart(product_id);
    $.ajax({
        url: '/cart/decrease',
        type: "POST",
        data: "productId="+product_id,
        dataType: "text",
        error: function(){
            alert("Ошибка");
        },
        success: success()
    });
}