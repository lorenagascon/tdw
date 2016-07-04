var date;
var pista;

$(document).ready(function () {

    $('#search').on('click', search);

    $('#save').on('click', function () {
        if (pista == '' || $('#player2').val() == '' || $('#player3').val() == '' || $('#player4').val() == '') {
            if (pista == '') {
                $('#choose-c').css('color', 'red');
            }
            else {
                $('#choose-c').css('color', 'black');
            }
            if ($('#player2').val() == '' || $('#player3').val() == '' || $('#player4').val() == '') {
                $('#choose-p').css('color', 'red');
            }
            else  $('#choose-p').css('color', 'black');
        }
        else {
            $.ajax({
                url: 'reservations',
                type: 'POST',
                data: {
                    'reservation_date': date,
                    '2nd_player': $('#player2').val(),
                    '3rd_player': $('#player3').val(),
                    '4th_player': $('#player4').val(),
                    'courts_id': pista
                },
                success: (function (data) {
                    toastr.success('Reserved successfully');
                    search();
                    $('#choose-p').css('color', 'black');
                    $('#player2').val('');
                    $('#player3').val('');
                    $('#player4').val('');
                })
            });
        }
    });

    function search() {
        pista = '';
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
                var row = '<hr><strong class="col-sm-12" id="choose-c">Choose a court:</strong>';
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

    }

});

$(function () {
    // Bootstrap DateTimePicker v4
    $('#datetimepicker').datetimepicker({
        format: 'DD/MM/YYYY',
        daysOfWeekDisabled: [0, 6],
        minDate: moment().add(1, 'days'),
        maxDate: moment().add(10, 'days')
    });
});

function reservar(event) {
    $('.table-selected').removeClass('table-selected');
    $(event).addClass('table-selected');
    pista = event.id;
}