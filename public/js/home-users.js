$(document).ready(function () {
    $('#search').on('click', function () {
        var fecha = $('#datetimepicker').data('date');
        var hora = $("#sel option:selected").val();
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