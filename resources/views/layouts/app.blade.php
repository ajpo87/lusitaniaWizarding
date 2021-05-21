<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Lusitania Wizarding') }}</title>
    
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/aux_carosel.css') }}" rel="stylesheet">
    
    <!-- Carrossel -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    
       
       </head>

<?php 

    // dd($__data); die;
    $data = \Auth::User();
    if(isset($data)){
        switch ($data['id_team']) {
         case 1: $background_img = "images/slytherin_room.jpg";
              break;
         case 2: $background_img = "images/ravenclaw_room.jpg";
             break;
         case 3: $background_img = "images/hufflepuff_room.jpg";
             break;
        case 4: $background_img = "images/gryffindor_room.jpg";
             break;
         
        default:
             $background_img = 'images/hogwarts.jpg;';
              break;
      }
    }
     
     

  
?>
<?php if( empty($data) || ( $data['first_time_login'] == true )){ ?>
    <body style="background-image: url('images/hogwarts.jpg'); width: 100%;height: auto; background-repeat: no-repeat;background-size: cover;">
<?php } 
else {
    ?>

    <body style="background-image: url('<?php echo $background_img; ?>'); opacity:0.9; width: 100%;height: auto; background-repeat: no-repeat;background-size: cover;">
<?php
    }

?>
    
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   Lusitania Wizarding
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" style="float: right;">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}"> Inicio </a> 
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('portugal')}}"> Portugal Wizarding </a> 
                        </li>
                        <li class="nav-item dropdown"></li>


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                               

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('config')}}">
                                        Configurar Perfil
                                    </a>
                                    <a class="dropdown-item" href="{{route('change_password')}}">
                                        Alterar Password
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
