@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Padel courts</div>
                <div class="panel-body">
                    <div class="col-sm-4">
                        <h4>Court 1</h4>
                        <table class="table table-bordered court">
                            <tbody>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                        <h4>Court 3</h4>
                        <table class="table table-bordered court">
                            <tbody>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                        <h4>Court 5</h4>
                        <table class="table table-bordered court">
                            <tbody>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-4">
                        <h4>Court 2</h4>
                        <table class="table table-bordered court">
                            <tbody>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                        <h4>Court 4</h4>
                        <table class="table table-bordered court">
                            <tbody>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                        <h4>Court 6</h4>
                        <table class="table table-bordered court">
                            <tbody>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            <tr class="success">
                                <th></th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset("js/admin-courts.js")}}"></script>
@endsection