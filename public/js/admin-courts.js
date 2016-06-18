$(document).ready(function () {
    getAllCourts();

    $('.panel-body').on("change", ":checkbox", function (event) {
        console.log(event.currentTarget);
        var aux = $(event.currentTarget).prop("checked");
        console.log(aux)
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
            console.log(jsonData);
            for (var i in jsonData) {
                row += '<div class="col-sm-4"><h4>Court ' + jsonData[i].id + '</h4>';
                row += '<input type="checkbox" id="' + jsonData[i].id + '"' + (jsonData[i].active ? "checked" : "") + '>Active court';
                row += '<table class="table table-bordered court"><tr class="success"><th></th><th></th></tr><tr class="success"><th></th><th></th></tr></table></div>';
            }

            $('.panel-body').append(row);
        },
        error: function (jqXHR, textStatus, error) {
            console.log(textStatus);
            console.log("error: " + jqXHR.responseText);
        }
    });
}