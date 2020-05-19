<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema Integral UTP</title>
    <!-- Scripts -->
    <link rel="shortcut icon" href="{{asset('/CODE_DATA/public/img/internal_statics/favicon.png')}}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{asset('/CODE_DATA/public/css/sb-admin.css') }}">
    <link href="{{asset('/CODE_DATA/public/css/css/validarCURP.css') }}">
    <link href="{{asset('/CODE_DATA/public/css/font-awesome.css')}}" />    
    <link href="{{asset('/CODE_DATA/public/css/app.css') }}" rel="stylesheet">

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    



    <style type="text/css">
        a{            
            font-size: 14px;
            font-weight: bold;
            text-decoration: none;
        }
        html{
          min-height: 100%;
          position: relative;
        }
        body {
          margin: 0;
          margin-bottom: 40px;
        }
        footer {
          background-color: black;
          position: absolute;
          bottom: 0;
          width: 100%;
          height: 40px;
          color: white;
}
    </style>
    
    @yield('estilos')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container">

                <a href="{{asset('/home')}}" class="logo">
                  <!-- logo for regular state and mobile devices -->
                  <span class="navbar-brand"><img src="{{asset('/CODE_DATA/public/img/internal_statics/logotitulo.png')}}" height="35px" width="120px" ></span>

                </a>

                <a class="navbar-brand" href="{{ asset('/') }}" style="color: white;">
                    Sistema Integral UTP
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}" style="color: white;">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ url('/pub/alumnos/createForm') }}" style="color: white;">{{ __('Registro') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            @yield('contenido')            
        </main>

        <footer class="sticky-footer">
          <div class="container">
            <div class="text-center">
              <small>Copyright © UTPoniente 2018</small>
            </div>
          </div>
        </footer>
    </div>

    <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="  sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="{{asset('/CODE_DATA/public/js/internal/sb-admin.min.js')}}"></script>
  <script src="{{asset('/CODE_DATA/public/js/internal/control.js') }}"></script>
  <script defer src="{{asset('/CODE_DATA/public/js/internal/prettyXMLHttpRequest-v3.0.0.min.js')}}"></script>

  @yield('scripts')

</body>
</html>
