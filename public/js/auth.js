function AjaxRegister() {
    let login = $('#loginText').val();
    let password = $('#pswdText').val();
    let email = $('#emailText').val();
    $.ajax({
        url: '/auth/register',
        type: "POST",
        data: {"login":login,"password":password,"email":email},
        dataType: "text",
        error: function(XMLHttpRequest){
            if (XMLHttpRequest.status == 401) {
                $.notify("Такой пользователь уже существует", {
                    className:'error',
                    clickToHide: true,
                    autoHide: true,
                    autoHideDelay:2000,
                    globalPosition: 'bottom-right'
                });
            }
        },
        success: success
    });
}
function success()
{
    $.notify("Успешно зарегистрирован", {
        className:'success',
        clickToHide: true,
        autoHide: true,
        autoHideDelay:1500,
        globalPosition: 'bottom-center'
    });
}
function AjaxLogin() {
    let login = $('#loginText').val();
    let password = $('#pswdText').val();
    $.ajax({
        url: '/auth/login',
        type: "POST",
        data: {"login":login,"password":password},
        dataType: "text",
        error: function(){
                $.notify('Произошла ошибка', {position: "right bottom"})
        },
        success:function () {
            location.href = "/"
        }
    });
}