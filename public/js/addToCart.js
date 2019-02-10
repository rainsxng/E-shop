function AjaxAddToCart(product_id)
{
    let quantity = $('#quantity').val();
    if (quantity == null) {
        quantity = 1;
    }
    $.ajax({
        url: '/cart/add',
        type: "POST",
        data: {"productId": product_id, "quantity": quantity},
        dataType: "text",
        error: function (XMLHttpRequest) {
            if (XMLHttpRequest.status == 300) {
                $.notify('Для добавления товаров необходимо авторизоваться!', {position: "right bottom"})
            } else if (XMLHttpRequest.status == 400) {
                $.notify('Некорректное количество товара!', {position: "right bottom"})
            }
        },
        success: success
    });
}

function success(result)
{
    $.notify("Добавлено", {
        className: 'success',
        clickToHide: true,
        autoHide: true,
        autoHideDelay: 1000,
        globalPosition: 'top right'
    });
}