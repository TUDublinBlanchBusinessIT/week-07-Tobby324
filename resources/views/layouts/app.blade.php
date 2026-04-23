<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ config('app.name') }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
              integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
              crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <script src="{{asset('js/app.js')}}"></script>
    </head>

    <body>
        <!-- Bootstrap 5 Navbar -->
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
          <div class="container-fluid">
            <ul class="navbar-nav">
              <li class="nav-item"> 
                <a class="nav-link" href={{ route('bookings.create')}}>New Booking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href={{ route('members.index')}}>Members List</a>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right:10px">
                @if(Auth::check())
                    @if(Auth::user()->hasRole('System Admin'))
                        @include('layouts.adminmenu')
                    @endif
                    <li><a href="{!! route('logout') !!}"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                @else
                    <li><a href="{!! route('login') !!}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <li><a href="{!! route('register') !!}"><span class="glyphicon glyphicon-user"></span> Register</a></li>
                @endif
            </ul>
          </div>
        </nav>
        
        <div id="page-content-wrapper"> 
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8"> @yield('content') </div>
                    <div class="col-lg-2"></div> 
                </div> 
            </div> 
        </div> 

        @stack('js_scripts')
    </body>
</html>