@extends('layouts.app')

@section('content')
    <h4>Sorry</h4>
    <h5>Wait until an admin enables you</h5>
@endsection

@section('dropdown')
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
    </ul>
@endsection