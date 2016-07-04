$(document).ready(function () {
    getAllUsers();

    var idToEdit;
    var idToDelete;

    //Editar los usuarios desde el botón del lápiz y el modal
    $('body').on('show.bs.modal', '#modalEdit', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var username = button.data('edit-username'); // Extract info from data-* attributes
        var email = button.data('edit-email');
        var rol = button.data('edit-rol');
        var name = button.data('edit-name');
        var surname = button.data('edit-surname');
        var phone = button.data('edit-phone');
        var active = button.data('edit-active');
        idToEdit = button.data('edit-id');
        var modal = $(this);

        modal.find("#usr").val(username);
        modal.find("#mail").val(email);
        modal.find("#nme").val(name);
        modal.find("#srnme").val(surname);
        modal.find("#phone").val(phone);
        if (active == 1) $("#act").prop('checked', true);
        if (active == 0) $("#act").prop('checked', false);
        $('#rol option[value="' + rol + '"]').prop('selected', 'selected');
    });

    $('#edit-button').on("click", function (event) {

        var modal = $('#modalEdit');
        $.ajax({
            url: '../users/' + idToEdit,
            type: 'PUT',
            data: "username=" + modal.find("#usr").val() + "&email=" + modal.find("#mail").val() + "&rol=" + modal.find("#rol option:selected").val() + "&name=" + modal.find("#nme").val() + "&surname=" + modal.find("#srnme").val() + "&phone=" + modal.find("#phone").val() + "&enabled=" + (modal.find("#act").is(':checked')? 1:0)
        }).done(function (data) {
                modal.modal('toggle');
                $("#tabla-usuarios tbody").empty();
                getAllUsers();
                $("#error-name").text('');
                $("#error-email").text('');
            })
            .fail(function (jqXHR, textStatus, error) {
                var respJson = JSON.parse(jqXHR.responseText);
                if (respJson.username) {
                    $("#error-name").html(respJson.username);
                }
                if (respJson.email) {
                    $("#error-email").html(respJson.email);
                }
            });
    });

    //Eliminar usuarios desde el botón de la papelera y el modal
    $('#modalDelete').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        idToDelete = button.data('delete-id'); // Extract info from data-* attributes
        $(this).find(".modal-body p").html("Do you want to delete user <b>" + button.data('delete-username') + "</b> ?");
    });

    $('#delete-button').on("click", function (event) {
            $.ajax({
                url: '../users/' + idToDelete,
                type: 'DELETE',
                cache: true
            }).done(function () {
                    $('#modalDelete').modal('toggle');
                    $("#tabla-usuarios tbody").empty();
                    getAllUsers();
                })
                .fail(function (jqXHR, textStatus, error) {
                    console.log("error: " + jqXHR.responseText);
                });
    });

    //Guardar los cambios realizados en los datos del perfil
    $('#prof-btn').on("click", function (event) {
        console.log('hola');
        if ($('#prof-psswrd').val() == $('#prof-psswrd-2').val())
            $.ajax({
                url: '../users/' + $('#prof-id').val(),
                type: 'PUT',
                data: "username=" + $('#prof-usr').val() + "&name=" + $('#prof-nme').val() + "&surname" + $('#prof-srnme').val() + "&email=" + $("#prof-mail").val() + "&phone=" + $('#prof-phone').val() + "&password=" + $('#prof-psswrd').val()
            }).done(function () {
                $('#prof-error').text('');
                $("#prof-success").text('Profile updated successfully');
            });
        else
            $('#prof-error').text('Password does not match');
    });

});


/* Funciones */
function getAllUsers() {
    $.ajax({
        url: '../users',
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

