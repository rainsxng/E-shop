$(document).ready(function () {
    let btn = document.getElementById("orderBtn");
    btn.onclick = function (e) {
        $.ajax({
            url: '/cart/order',
            type: "POST",
            error: function () {
                alert("Ошибка");
            },
            success: function () {
                alert("Заказ оформлен");
                success();
            }
        });
    }
});

