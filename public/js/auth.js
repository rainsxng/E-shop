function AjaxRegister()
{
    let login = $('#loginText').val();
    let password = $('#pswdText').val();
    let email = $('#emailText').val();
    $.ajax(
        {
            url: '/auth/register',
            type: "POST",
            data: {"login": login, "password": password, "email": email},
            dataType: "json",
            error: function (response) {
                let res = (JSON.parse(response.responseText));
                if (res.location=="")
                {
                    $.notify(res.message, {
                        className: 'error',
                        clickToHide: true,
                        autoHide: true,
                        autoHideDelay: 2000,
                        globalPosition: 'bottom-right'
                        }
                    );
                } else {
                    document.getElementById(res.location).innerHTML = res.message;
                }

            },
            success: success
        }
    );
}

function success(result)
{
    let response = JSON.parse(result);
    $.notify(response.message, {
        className: 'success',
        clickToHide: true,
        autoHide: true,
        autoHideDelay: 1500,
        globalPosition: 'bottom-center'
    });
}

function AjaxLogin()
{
    let login = $('#loginText').val();
    let password = $('#pswdText').val();
    if (((login.length == 0) || (password.length == 0))) {
        $.notify('Необходимо заполнить все поля', {position: "right bottom"});
        return;
    }
    $.ajax(
        {
            url: '/auth/login',
            type: "POST",
            data: {"login": login, "password": password},
            dataType: "text",
            error: function () {
                $.notify('Произошла ошибка', {position: "right bottom"})
            },
            success: function (result) {
                let res = JSON.parse(result);
                if (res === true) {
                    $(window).attr('location', '/')
                } else {
                    $.notify('Неверный логин / пароль', {position: "right bottom"});
                }
            }

        }
    );
}

function AjaxLogout()
{
    $.ajax(
        {
            url: '/auth/logout',
            type: "POST",
            dataType: "text",
            error: function () {
                $.notify('Произошла ошибка', {position: "right bottom"})
            },
        }
    );
}