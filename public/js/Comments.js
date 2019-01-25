function AddComment(product_id,user_id)
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
