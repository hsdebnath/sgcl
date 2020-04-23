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

    <script src="https://code.jquery.com/jquery-3.3.1.js" ></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js" ></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js" ></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js" ></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css" rel="stylesheet">
    

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
                        <span class="fa  fa-home text-primary"></span>    
                    </a> --}}
                    <h4 class="text-success">{{ Auth::user()->name }}</h4>

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
                    <a href="/dash" class="list-group-item list-group-item-action bg-light "><h5><i class="fa  fa-home">&nbsp;&nbsp;&nbsp;Dashboard</i></h5></a>
                    <a href="/report" class="list-group-item list-group-item-action bg-light border-0"><h5><i class="fa  fa-bar-chart">&nbsp;&nbsp;&nbsp;Reports</i></h5></a>
                    <a href="/inventory" class="list-group-item list-group-item-action bg-light"><h5><i class="fa  fa-cube">&nbsp;&nbsp;&nbsp;Inventory</i></h5></a>
                    <a href="/orders/" class="list-group-item list-group-item-action bg-light border-0"><h5><i class="fa  fa-shopping-basket">&nbsp;&nbsp;&nbsp;Orders</i></h5></a>
                    <a href="/purchase" class="list-group-item list-group-item-action bg-light"><h5><i class="fa  fa-ship">&nbsp;&nbsp;&nbsp;Purchase</i></h5></a>
                    <a href="/sales/" class="list-group-item list-group-item-action bg-light border-0"><h5><i class="fa  fa-truck">&nbsp;&nbsp;&nbsp;Sales</i></h5></a>
                    <a href="/account" class="list-group-item list-group-item-action bg-light"><h5><i class="fa  fa-money">&nbsp;&nbsp;&nbsp;Transactions</i></h5></a>
                    <a href="/expanse/" class="list-group-item list-group-item-action bg-light border-0"><h5><i class="fa  fa-credit-card">&nbsp;&nbsp;&nbsp;Expanses</i></h5></a>
                    <a href="/fund/" class="list-group-item list-group-item-action bg-light border-0"><h5><i class="fa  fa-shield">&nbsp;&nbsp;&nbsp;Funds</i></h5></a>
                    <a href="/bank" class="list-group-item list-group-item-action bg-light border-0"><h5><i class="fa  fa-bank">&nbsp;&nbsp;&nbsp;Banks</i></h5></a>
                    <a href="/items" class="list-group-item list-group-item-action bg-light "><h5><i class="fa  fa-tags">&nbsp;&nbsp;&nbsp;Items</i></h5></a>
                    <a href="/users" class="list-group-item list-group-item-action bg-light"><h5><i class="fa  fa-users">&nbsp;&nbsp;&nbsp;Users</i></h5></a>
                    <a href="/company" class="list-group-item list-group-item-action bg-light border-0"><h5><i class="fa  fa-industry">&nbsp;&nbsp;&nbsp;Clients</i></h5></a>
                    <h4 class="list-group-item list-group-item-action bg-light" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        if(confirm('Confirm Logout !')){ 
                                        document.getElementById('logout-form').submit(); } ">
                            {{ __('Logout') }}
                        <i class="fa fa-power-off "></i> 
                    </h4>
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

            if ($(window).width() > 768) {

                $("#wrapper").toggleClass("toggled");
            }           
            
            $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
            });
        });
      </script>
</body>
</html>
