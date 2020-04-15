<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/custom.js') }}" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <style type="text/css">
        html, body {
         overflow-x: hidden;
        }
        .navbar-toggler{
            display: block!important;
        }
    </style>


</head>
<body>
    <div id="app">
        <div class="row">
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white shadow-sm" style="z-index = 999">
            <div class="container">
                @guest
                @else
                    <button class="navbar-toggler " type="button" id="menu-toggle">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- <a class="navbar-brand" href="{{ url('/home') }}">
                        <span class="fa fa-2x fa-home text-primary"></span>    
                    </a> --}}
                    <h4>{{ Auth::user()->name }}</h4>

                {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button> --}}

                @endguest 
                
            </div>
        </nav><br><br><br>
        </div>
        <div id="wrapper">

            <!-- Sidebar -->
            @guest
            @else
            <div class="bg-light border-right sidebar-wrapper" id="sidebar-wrapper">
                <div class="list-group list-group-flush">
                    <a href="/dash" class="list-group-item list-group-item-action bg-light ">Dashboard</a>
                    <a href="/items" class="list-group-item list-group-item-action bg-light ">Items</a>
                    <a href="/inventory" class="list-group-item list-group-item-action bg-light border-0">Inventory</a>
                    <a href="/orders" class="list-group-item list-group-item-action bg-light border-0">Orders</a>
                    <a href="/sales" class="list-group-item list-group-item-action bg-light">Sales</a>
                    <a href="/purchase" class="list-group-item list-group-item-action bg-light border-0">Purchase</a>
                    <a href="/users" class="list-group-item list-group-item-action bg-light">Users</a>
                    <a href="/company" class="list-group-item list-group-item-action bg-light border-0">Clients</a>
                    <a href="/account" class="list-group-item list-group-item-action bg-light">Transactions</a>
                    <a href="/expanse" class="list-group-item list-group-item-action bg-light border-0">Expanses</a>
                    <a href="/fund" class="list-group-item list-group-item-action bg-light border-0">Funds</a>
                    <a class="list-group-item list-group-item-action bg-light" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        if(confirm('Confirm Logout !')){ 
                                        document.getElementById('logout-form').submit(); } ">
                            {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="list-group-item list-group-item-action bg-light border-0"></a>
                    <a href="#" class="list-group-item list-group-item-action bg-light border-0"></a>
                </div>
            </div>
            @endguest
            <!-- /#sidebar-wrapper -->
        <div class="row">
        <main class="container py-4">
            @include('includes.msgs')

            {{-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Tap on table rows </strong> to view details !!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div> --}}

            @yield('content')   
        </main>
    </div>
    </div>

    <script>
        $(document).ready(function(){

            $("#wrapper").toggleClass("toggled");
            
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        });
      </script>
</body>
</html>
