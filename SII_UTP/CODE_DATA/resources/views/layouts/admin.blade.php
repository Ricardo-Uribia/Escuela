<!DOCTYPE html>
<html>
<head><meta charset="gb18030">
  
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SII-UTP</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('/CODE_DATA/public/css/font-awesome.css')}}">
  <link rel="shortcut icon" href="{{asset('/CODE_DATA/public/img/internal_statics/favicon.png')}}"/>    
  <link rel="stylesheet" href="{{asset('/CODE_DATA/public/css/OverlayScrollbars.min.css')}}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/CODE_DATA/public/css/adminlte.css')}}">
  <link rel="stylesheet" href="{{asset('/CODE_DATA/public/css/devStyles.css')}}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
   @yield('estilos')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Alumnos</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Empleados</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <div class="ml-4">
      <div class="input-group input-group-sm">
        <input id="idCicloGlobal" 
          class="inline-block" 
          disabled="disabled" 
          class="form-control form-control-navbar" type="text"
          value="{{Session::has('ciclos') ? Session::get('ciclos')->descripcion : 'Sin ciclo actual'}}">
          <button data-target="#modal_cambio_ciclos" data-toggle="modal" class="btn-neutral sys-background-color" onclick="mostrarCiclos()" >
            <b>{{Session::has('ciclos') ? 'Cambiar de ciclo' : 'Seleccionar ciclo'}}</b>
          </button>      
      </div>
    </div>

     
    <div class="navbar-nav ml-auto"> 
                  <span class="hidden-xs"><strong>Hola: </strong>{{Auth::user()->name }}</span>
    </div>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fa fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="{{asset('/admin/index')}}" class="dropdown-item">
            <i class="fa fa-user mr-2"></i> Perfil de usuario
          </a>
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="dropdown-item">
            <i class="fa fa-sign-out fa-fw"></i> Cerrar
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                  </form>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="navbar-brand">
        <img src="{{asset('/CODE_DATA/public/img/internal_statics/logotitulo.png')}}" alt="UTP Logo" width="120px" height="35px" 
           style="opacity: .8">
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->    
      @if(Auth::user()->role == 1)
        @include('../Backend/Menu/adminMenu')
      @elseif(Auth::user()->role == 2)
        @include('../Backend/Menu/profesorMenu')
      @elseif(Auth::user()->role == 3)
        @include('../Backend/Menu/alumnoMenu')
      @endif
     
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">            
              <li class="breadcrumb-item active">Sistema de Información Integral de la Universidad Tecnologica del poniente</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

      <div style="padding-left: 3%; padding-right: 3%">           
        @yield('contenido')      
        <br>
        <br>  

      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020- </strong>    
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 0.0.1-estructurado Beta
    </div>
  </footer>

   <!-- Modal de cambio de ciclos -->
  <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" id="modal_cambio_ciclos">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header sys-background-color">
        <h5 class="modal-title" id="exampleModalLabel">Cambiar ciclo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <select id="select_modal_cambio_ciclo" class="form-control" onchange="crearSessionCiclo(this.value)"> 
          </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>
    <!-- Fin del modal -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('/CODE_DATA/public/js/internal/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
{{-- <script src="{{asset('/CODE_DATA/public/js/internal/jquery-ui.min.js')}}"></script> --}}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script defer src="{{asset('/CODE_DATA/public/js/developer/global/sys.js')}}"></script>
{{-- 
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script> --}}
<script src="{{asset('/CODE_DATA/public/js/internal/bootstrap.bundle.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('/CODE_DATA/public/js/internal/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/CODE_DATA/public/js/internal/adminlte.js')}}"></script>

<script defer src="{{asset('/CODE_DATA/public/js/internal/prettyXMLHttpRequest-v3.0.0.min.js')}}"></script>

<script>
  var url_crear_ciclo = "{{url('/any/select/work/ciclo')}}"
  var url_fetch_ciclos = "{{url('/any/fetch/ciclos')}}"
  function crearSessionCiclo(ciclo){
    var ciclo_id = parseInt(ciclo)
    if(Number.isInteger(ciclo_id)){  
       $.ajax({
          url: url_crear_ciclo+"/"+ciclo_id,
          type:'get',     
          success:function(data){
            console.log(data.ciclo)
            $("#idCicloGlobal").html('').append(`<input class="form-control" disabled value="${data['ciclo']}">`)

              setTimeout(window.location=window.location.href, 5000);
          }
        });
       $("#modal_cambio_ciclos").modal('hide')
    }

  }

  function mostrarCiclos(){
    var select_modal_cambio_ciclo= $('#select_modal_cambio_ciclo')
    $.ajax({
      url: url_fetch_ciclos,
      type:'get',     
      beforeSend:function(){
        select_modal_cambio_ciclo.append(`<option>--Cargando..</option>`)
      },
      success:function(data){
        if (data.length > 0) { 
          select_modal_cambio_ciclo.html('').append('<option>--Seleccionar</option>')

          for (var i = 0; i < data.length; i++) {
            select_modal_cambio_ciclo.append(`<option value='${data[i].id}'>${data[i].descripcion}</option> `)
          }
        }else{
           $("#modal_cambio_ciclos").modal('hide')
           alert("No hay ciclos..")
        }
      }
    });
  } 
</script>
 @yield('scripts')
</body>
</html>
