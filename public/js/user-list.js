$(document).ready(function () {
    console.log('sdf');
    $.ajax({
        url: '../reservations',
        type: 'GET',
        data: "id=" + $('#miID').val(),
        success: (function (data) {
            var jsonData = data.reservations;
            console.log(jsonData);
            for (var i in jsonData) {
                row = '<tr><td>' + jsonData[i].courts_id + '</td><td>' + jsonData[i]['2nd_player']
                    + '</td><td>' + jsonData[i]['3rd_player'] + '</td><td>' + jsonData[i]['4th_player']
                    + '</td><td>' + jsonData[i].reservation_date + '</td><td>' + jsonData[i].created_at + '</td></tr>';

                $('#lista').append(row);
            }
        })
    });
});
