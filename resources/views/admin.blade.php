@extends('layouts.app')

@section('navbar')
    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
            <li><a href="{{ url('/admin') }}">Home</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="{{ url('/admin/users') }}">Users</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="{{ url('/admin/courts') }}">Courts</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->username }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <h1> Welcome to the admin console</h1>
@endsection