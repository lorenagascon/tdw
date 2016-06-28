$(document).ready(function () {
    var date;
    var pista;

    $('#search').on('click', function () {
        var fecha = $('#datetimepicker').data('date');
        var hora = $("#sel option:selected").val();
        date = moment(fecha + ' ' + hora, 'DD/MM/YYYY HH:mm').format('YYYY-MM-DD HH:mm:ss');
        $('.imagen').hide();
        $('#jugadores').removeClass('hidden');
        $.ajax({
            url: 'courts',
            type: 'GET',
            dataType: "json",
            success: function (data) {
                $('#reservas').empty();
                var jsonData = data.courts;
                var row = '<hr><strong class="col-sm-12" for="cou">Choose a court:</strong>';
                var active;

                for (var i in jsonData) {
                    active = jsonData[i].active;
                    if (active) {
                        row += '<div class="col-sm-4"><h4>Court ' + jsonData[i].id + '</h4>';
                        row += '<table id="' + jsonData[i].id + '" class="tabla table table-bordered court" onClick="reservar(this)"><tr class="success"><th></th><th></th></tr><tr class="success"><th></th><th></th></tr></table></div>';
                    }
                }

                $('#reservas').append(row);

                $.ajax({
                    url: 'reservations',
                    type: 'GET',
                    data: "date=" + date,
                    success: (function (data) {
                        var jsonData = data.reservations;
                        for (var i in jsonData) {
                            var tabla = $('#' + jsonData[i].courts_id);
                            tabla.prop('onclick', null).off('click');
                            tabla.removeClass('tabla');
                            tabla.find('tr').removeClass('success').addClass('danger');
                        }
                    })
                });
            }
        });

    });

    $('#save').on('click', function () {
        if (pista == '') {
            
        }
    });
});

$(function () {
    // Bootstrap DateTimePicker v4
    $('#datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        daysOfWeekDisabled: [0, 6],
        minDate: moment(),
        maxDate: moment().add(10, 'days')
    });
});

function reservar(event) {
    $('.table-selected').removeClass('table-selected');
    $(event).addClass('table-selected');
    pista = event.id;
}