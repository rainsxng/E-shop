$(document).ready(function () {
    let updatePswdBtn = document.getElementById("updatePswdBtn");
    let updateEmailBtn = document.getElementById("updateEmailBtn");
    let deleteBtn = document.getElementById("deleteBtn");
    updatePswdBtn.onclick = function (e) {
        let oldPassword = $('#oldPswd').val();
        let newPassword = $('#newPswd').val();
        if (oldPassword.length == 0 || newPassword.length == 0) {
            $.notify('Заполните все поля', {position: "right bottom"});
            return;
        } else {
            $.ajax(
                {
                    url: '/user/changePassword',
                    type: "POST",
                    data: {"oldPassword": oldPassword, "newPassword": newPassword},
                    error: function (response) {
                        let data = JSON.parse(response.responseText);
                        if (data.location == "") {
                            $.notify(data.message, {
                                    className: 'error',
                                    clickToHide: true,
                                    autoHide: true,
                                    autoHideDelay: 2000,
                                    globalPosition: 'bottom-right'
                                }
                            );
                        } else {
                            document.getElementById(data.location).innerHTML = data.message;
                        }
                    },
                    success: function (data, textStatus, XmlHttpRequest) {
                        let res = JSON.parse(XmlHttpRequest.responseText);
                        $.notify(res.message, {
                            className: 'success',
                            clickToHide: true,
                            autoHide: true,
                            autoHideDelay: 1500,
                            globalPosition: 'bottom-center'
                        });
                    }
                }
            );
        }
    }
    updateEmailBtn.onclick = function (e) {
        let newEmail = $('#newEmail').val();
        if (newEmail.length==0) {
            $.notify('Заполните поле с новым электронным адресом', {position: "right bottom"});
            return;
        }
        $.ajax(
            {
                url: '/user/changeEmail',
                type: "POST",
                data: {"newEmail": newEmail},
                error: error,
                success: function (data, textStatus, XmlHttpRequest) {
                    let res = JSON.parse(XmlHttpRequest.responseText);
                    $.notify(res.message, {
                        className: 'success',
                        clickToHide: true,
                        autoHide: true,
                        autoHideDelay: 1500,
                        globalPosition: 'bottom-center'
                    });
                    $('#userEmail').text('Электронный адрес: '+newEmail)
                }
            }
        );
    }

    deleteBtn.onclick = function (e) {
        let answer = confirm("Вы точно хотите удалить аккаунт ? ");
        if (answer == true) {
            $.ajax(
                {
                    url: '/user/delete',
                    type: "POST",
                    error: error,
                    success: function () {
                        $(window).attr('location', '/');
                    }
                }
            );
        }
    }
});


function error(response)
{
    let data = JSON.parse(response.responseText);
    if (data.location == "") {
        $.notify(data.message, {
            className: 'error',
            clickToHide: true,
            autoHide: true,
            autoHideDelay: 2000,
            globalPosition: 'bottom-right'
            }
        );
    } else {
        document.getElementById(data.location).innerHTML = data.message;
    }
}

function success(data, textStatus, XmlHttpRequest)
{
    let res = JSON.parse(XmlHttpRequest.responseText);
    $.notify(res.message, {
        className: 'success',
        clickToHide: true,
        autoHide: true,
        autoHideDelay: 1500,
        globalPosition: 'bottom-center'
    });
}