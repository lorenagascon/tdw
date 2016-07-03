@extends('layouts.app')

@section('navbar')
        <!-- Left Side Of Navbar -->
<ul class="nav navbar-nav">
    <li><a href="{{ url('/') }}">Home</a></li>
    <li><a href="{{ url('user/list') }}">Reservations</a></li>
</ul>
@endsection

@section('dropdown')
    <ul class="dropdown-menu" role="menu">
        <li><a href="{{ url('/user/profile') }}"><i class="fa fa-btn"></i>Profile</a></li>
        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
    </ul>
@endsection