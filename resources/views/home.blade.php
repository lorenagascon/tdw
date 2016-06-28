@extends('user')

@section('header')
    <img class="img-responsive imagen" src="../public/img/padel.jpg">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class='col-sm-4 col-sm-offset-1'>
                <div class="form-group">
                    <label for="cal">Choose a day:</label>
                    <div class='input-group date' id='datetimepicker'>
                        <input type='text' class="form-control"/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="sel">Choose an hour:</label>
                    <select class="form-control" id="sel">
                        <option>9:00</option>
                        <option>10:00</option>
                        <option>11:00</option>
                        <option>12:00</option>
                        <option>13:00</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <button id="search" class="btn btn-success">Search for courts</button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <form id="jugadores" class="hidden">
                    <hr>
                    <strong id="separar" class="col-sm-12">Choose the players:</strong>
                    <div class="form-group">
                        <label for="player1">Player 1</label>
                        <input type="text" class="form-control" id="player1" disabled="disabled"
                               value={{ Auth::user()->username}}>
                    </div>
                    <div class="form-group">
                        <label for="player2">Player 2</label>
                        <input type="text" class="form-control" id="player2">
                    </div>
                    <div class="form-group">
                        <label for="player3">Player 3</label>
                        <input type="text" class="form-control" id="player3">
                    </div>
                    <div class="form-group">
                        <label for="player4">Player 4</label>
                        <input type="text" class="form-control" id="player4">
                    </div>
                    <input type="button" id="save" class="btn btn-success" value="Save">
                </form>
            </div>
            <div id="reservas" class="col-sm-9">

            </div>
        </div>
    </div>
    <script src="{{asset("js/home-users.js")}}"></script>
@endsection

