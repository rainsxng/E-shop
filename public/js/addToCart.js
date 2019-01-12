function AjaxAddToCart(product_id) {
    $.ajax({
        url: '/cart/add',
        type: "POST",
        data: "productId="+product_id,
        dataType: "text",
        error: function(){
            $.notify('Для добавления товаров необходимо авторизоваться!', {position:"right bottom"})
        },
        success: success
    });
}
function success()
{
    $.notify("Добавлено", {
        className:'success',
        clickToHide: true,
        autoHide: true,
        autoHideDelay:1000,
        globalPosition: 'top right'
    });
}