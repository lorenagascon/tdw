@extends('user')

@section('content')

    <div class="col-sm-6 col-sm-offset-3">
        <div class="form-group col-sm-3">
            <label for="prof-id">Id:</label>
            <input type="text" class="form-control" id="prof-id" disabled="disabled" value={{ Auth::user()->id }}>
        </div>
        <div class="form-group col-sm-9">
            <label for="prof-usr">Username:</label>
            <input type="text" class="form-control" id="prof-usr" disabled="disabled"
                   value={{ Auth::user()->username }}>
        </div>
        <div class="form-group col-sm-12">
            <label for="prof-nme">Name:</label>
            <input type="text" class="form-control" id="prof-nme" value={{ Auth::user()->name }}>
        </div>
        <div class="form-group col-sm-12">
            <label for="prof-srnme">Surname:</label>
            <input type="text" class="form-control" id="prof-srnme" value={{ Auth::user()->surname }}>
        </div>
        <div class="form-group col-sm-12">
            <label for="prof-mail">Email:</label>
            <input type="text" class="form-control" id="prof-mail" value={{ Auth::user()->email }}>
        </div>
        <div class="form-group col-sm-12">
            <label for="phone">Phone number:</label>
            <input type="text" class="form-control" id="prof-phone" value={{ Auth::user()->telephone }}>
        </div>
        <div class="form-group col-sm-12">
            <label for="prof-psswrd">Password:</label>
            <input type="password" class="form-control" id="prof-psswrd" value={{ Auth::user()->password }}>
        </div>
        <div class="form-group col-sm-12">
            <label for="prof-psswrd-2">Confirm password:</label>
            <input type="password" class="form-control" id="prof-psswrd-2" value={{ Auth::user()->password }}>
            <span id="prof-error"></span>
        </div>
        <div class="col-sm-12">
            <button id="prof-btn" class="btn btn-primary">Save changes</button>
            <span>
                <strong id="prof-success"></strong>
            </span>
        </div>

    </div>
    <script src="{{asset("js/admin-users.js")}}"></script>
@endsection
