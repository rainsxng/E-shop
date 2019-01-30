$(document).ready(function () {
    let btn = document.getElementById("updatePswdBtn");
    btn.onclick = function (e) {
        let oldPassword = $('#oldPswd').val();
        let newPassword = $('#newPswd').val();
        if (oldPassword.length == 0 || newPassword.length == 0) {
            $.notify('Заполните все поля', {position: "right bottom"});
            return;
        }
        else {
            $.ajax(
                {
                    url: '/user/changePassword',
                    type: "POST",
                    data: {"oldPassword": oldPassword, "newPassword": newPassword},
                    error: function (response) {
                        let data = JSON.parse(response.responseText);
                        if (data.location=="")
                        {
                            $.notify(data.message,{
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
});