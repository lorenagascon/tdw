@extends('user')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Reservations</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table" id="tabla-reservas">
                            <thead>
                            <tr>
                                <th>Court</th>
                                <th>Player2</th>
                                <th>Player3</th>
                                <th>Player4</th>
                                <th>Reservation date</th>
                                <th>Reserved at</th>
                            </tr>
                            </thead>
                            <tbody id="lista"></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset("js/user-list.js")}}"></script>
@endsection
