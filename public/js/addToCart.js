function AjaxAddToCart(product_id) {
    $.ajax({
        url: '/cart/add',
        type: "POST",
        data: "productId="+product_id,
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
    alert("Добавлено");
}