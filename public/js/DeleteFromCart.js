function DeleteOneFromCart(product_id)
{
    $.ajax({
        url: '/cart/deleteOne',
        type: "POST",
        data: "productId="+product_id,
        dataType: "text",
        error: error,
        success: success
    });
}

function DeleteAllFromCart()
{
    $.ajax({
        url: '/cart/deleteAll',
        type: "POST",
        dataType: "text",
        error: error,
        success: success
    });
}

function error()
{
    alert('Ошибка при загрузке данных!');
}
function success()
{
    alert("Удалено");
}