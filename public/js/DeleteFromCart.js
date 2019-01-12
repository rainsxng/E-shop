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
function success() {
    setTimeout(function () {// wait for 1 secs(2)
        location.reload(); // then reload the page.(3)
    }, 1);
}