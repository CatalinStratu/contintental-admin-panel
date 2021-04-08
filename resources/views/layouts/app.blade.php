<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
          integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <title>Contintental - Admin Panel</title>
</head>

<body>
<!-- NAVBAR -->
<div class="nav">
    <div class="nav__left">
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
        <div class="logo1">
            <a href="{{route('dashboard')}}"><img src="{{ asset('assets/img/logo_continental_2.png') }}" alt="logo"></a>
        </div>
    </div>
    <div class="nav__center">
        <form action="#" id="search">
            <input type="text" placeholder="Search users..." spellcheck="false" class="nav__center__textbox">
        </form>
        <button type="submit" form="search" value="Submit"><i class="fas fa-search"></i></button>
    </div>
    <div class="logo2">
        <img src="{{ asset('assets/img/logo_continental_2.png') }}" alt="logo">
    </div>
    <div class="nav__right">
        <a href="#" class="settings"><i class="fas fa-cog"></i></a>
        <a href="{{ route('bug') }}"><i class="fas fa-bug"></i></a>
            <!-- Authentication -->
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="logout"><i
                    class="fas fa-sign-out-alt"></i></a>
            <form id="logout-form" method="POST" action="{{ route('logout') }}">
                @csrf
            </form>
    </div>
</div>

<!-- SETTINGS FORM -->
<div class="settings_form">
    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updateProfileInformation()))
        @include('profile.update-profile-information-form')
    @endif
</div>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="sidebar__admin">
        <img src="{{ asset('assets/img/admin.png') }}" alt="admin picture">
        <div class="sidebar__admin__details">
            <p id="nume-admin">{{ auth()->user()->name }}</p>
            <p id="functie-admin">@if(auth()->user()->type == '1') Admin @else Employee @endif</p>
        </div>
    </div>
    <div class="sidebar__options">
        <ul>
            <li class="{{ Request::routeIs('dashboard') ? 'actual' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <div class="selector"></div>
                    <i class="fas fa-th-large"></i>Dashboard
                </a>
            </li>
            @if(auth()->user()->type == 1)
                <li class="{{ Request::routeIs('employees') ? 'actual' : '' }}">
                    <a href="{{route("employees")}}">
                        <div class="selector"></div>
                        <i class="fas fa-users"></i>Employees
                    </a>
                </li>
                <li class="{{ Request::routeIs('rooms') ? 'actual' : '' }}">
                    <a href="{{route("rooms")}}">
                        <div class="selector"></div>
                        <i class="fas fa-door-open"></i>Rooms
                    </a>
                </li>
                <li class="{{ Request::routeIs('rooms.type') ? 'actual' : '' }}">
                    <a href="{{route("rooms.type")}}">
                        <div class="selector"></div>
                        <i class="fas fa-th-list"></i>Rooms Type
                    </a>
                </li>
                <li class="{{ Request::routeIs('reservations') ? 'actual' : '' }}">
                    <a href="{{ route("reservations") }}">
                        <div class="selector"></div>
                        <i class="far fa-calendar-alt"></i>Reservations
                    </a>
                </li>
                <li class="{{ Request::routeIs('emails') ? 'actual' : '' }}">
                    <a href="{{ route("emails") }}">
                        <div class="selector"></div>
                        <i class="fas fa-envelope"></i>Emails
                    </a>
                </li>
            @endif
        </ul>
    </div>
</div>
<!-- CONTENT DASHBOARD START-->

@yield('form')
<div class="content">
    {{ $content}}
    <footer>Continental &copy; 2021</footer>
</div>
<!-- CONTENT DASHBOARD END -->
<script src="{{ asset('assets/js/main.js') }}"></script>
@yield('js')
</body>
</html>

@yield('content')


