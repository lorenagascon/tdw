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
    </div>
    <script src="{{asset("js/home-users.js")}}"></script>
@endsection

