$(document).ready(function () {
    getAllCourts();

    $('.panel-body').on("change", ":checkbox", function (event) {
        var aux = $(event.currentTarget).prop("checked") ? 1 : 0;
        console.log(aux);
        $.ajax({
            url: '../courts/' + event.currentTarget.id,
            type: 'PUT',
            data: "active=" + aux,
            success: function (data) {
                $('.panel-body').empty();
                getAllCourts();
            },
            error: function (jqXHR, textStatus, error) {
                console.log(textStatus);
                console.log("error: " + jqXHR.responseText);
            }
        });
    });
});


function getAllCourts() {
    $.ajax({
        url: '../courts',
        type: 'GET',
        dataType: "json",
        success: function (data) {
            var jsonData = data.courts;
            var row = '';
            var active;
            console.log(jsonData);
            for (var i in jsonData) {
                active = jsonData[i].active;
                row += '<div class="col-sm-4"><h4>Court ' + jsonData[i].id + '</h4>';
                row += '<input type="checkbox" id="' + jsonData[i].id + '"' + (active ? "checked" : "") + '>Active court';
                row += '<table class="table table-bordered court"><tr class="' + (active ? "success" : "active") + '"><th></th><th></th></tr><tr class="' + (active ? "success" : "active") + '"><th></th><th></th></tr></table></div>';
            }

            $('.panel-body').append(row);
        },
        error: function (jqXHR, textStatus, error) {
            console.log(textStatus);
            console.log("error: " + jqXHR.responseText);
        }
    });
}