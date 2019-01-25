function AddComment(product_id,user_id)
{
    if (user_id==null)
    {
        $.notify('Для добавления комментариев необходима авторизация!', {position: "right bottom"})
        return;
    }
    let estimate = $('#estimate').val();
    if (estimate<1 || estimate>5)
    {
        $.notify('Оценка должна быть в диапазоне от 1 до 5 !', {position: "right bottom"});
        return;
    }
    let text = $('#commentMessage').val();
    if (text == "" || text.length<=3)
    {
        $.notify('Некорректный текст отзыва !', {position: "right bottom"});
        return;
    }
    $.ajax({
        url: '/comment/add',
        type: "POST",
        data: {"product_id":product_id,"user_id":user_id,"message":text,"stars":estimate},
        dataType: "text",
        error: function(){
            alert("Ошибка");
        },
        success: function (result) {
            console.log(JSON.parse(result));
        }
    });
}
