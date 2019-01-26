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
        success: function (comment) {
            let result = JSON.parse(comment);
            let html = ' <li class="media">\n' +
                '<a  class="pull-left mr-5">\n' +
                '<img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">\n' +
                '</a>\n' +
                ' <div class="media-body">\n' +
                '<span class="text-muted pull-right">\n' +
                '<small class="text-muted">'+result.date+'</small>\n' +
                '</span>\n' +
                '<strong class="text-success">'+result.userLogin+'</strong>\n' +
                '<p>\n' +
                ' <p>'+result.star+'</p>\n' +
                ''+result.message+'\n' +
                '</p>\n' +
                '</div>\n' +
                '</li>';
            $('.media-list').prepend(html);
           let count = $("#count").text();
           $("#count").text(+count+1);
        }
    });
}
