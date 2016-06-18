$(document).ready(function () {
    
    getAllCourts();

});

function getAllCourts() {
    $.ajax({
        url: '../courts',
        type: 'GET',
        dataType: "json",
        success: function (data) {
            var jsonData = data.users;
            console.log(jsonData);
            for (var i in jsonData) {
                var row = '<tr class="' + (!jsonData[i].enabled ? 'active' : '') + '">';
                if (jsonData[i].rol == '1')
                    row += '<td><span class="glyphicon glyphicon-cog"></span></td>';
                else
                    row += '<td><span class="glyphicon glyphicon-user"></span></td>';

                row += '<td class="id">' + jsonData[i].id + '</td><td>' + jsonData[i].username + '</td><td>' + jsonData[i].email +
                    '</td><td><button type="button" class="edit btn btn-default" data-edit-id="' + jsonData[i].id + '" data-edit-username="' + jsonData[i].username + '" data-edit-email="' + jsonData[i].email + '" data-edit-rol="' + jsonData[i].rol + '" data-edit-active="' + jsonData[i].enabled + '"data-edit-name="' + jsonData[i].name + '" data-edit-surname="' + jsonData[i].surname + '" data-edit-phone="' + jsonData[i].phone + '" data-toggle="modal" data-target="#modalEdit" aria-label="Left Align">' +
                    '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>' +
                    '<button type="button" class="delete btn btn-default" data-delete-id="' + jsonData[i].id + '" data-delete-username="' + jsonData[i].username + '"data-toggle="modal" data-target="#modalDelete" aria-label="Left Align">' +
                    '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></td>';

                $('#tabla-usuarios').append(row);
            }
        },
        error: function (jqXHR, textStatus, error) {
            console.log(textStatus);
            console.log("error: " + jqXHR.responseText);
        }
    });
}