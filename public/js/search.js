$(document).ready(function () {
    let searchBtn = document.getElementById("searchBtn");
    $('#typeahead').typeahead({
        source: function (query, result) {
            $.ajax({
                url: "/search",
                method: "POST",
                data: {
                    query: query
                },
                dataType: "json",
                success: function (data) {
                    result($.map(data, function (item) {
                        return item;

                    }));
                }

            })
        },
        updater: function (item) {
            location.href = '/product/' + item.id;
            return item
        }
    });
});