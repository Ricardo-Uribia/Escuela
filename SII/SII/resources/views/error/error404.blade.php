<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Control Escolar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.png')}}">
  


  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{url('/home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>UT</b>P</span>
          <!-- logo for regular state and mobile devices -->
          <span class="navbar-brand"><img src="{{url('/')}}/img/logotitulo.png" height="35px" width="120px" ></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <span class="hidden-xs"><strong>Hola: </strong>{{Auth::user()->name }}</span>
                    <strong>
            @switch(Auth::user()->role)
                @case(1)
                    Tipo: Administrador
                @break
                @case(2)
                    Tipo: Profesor
                @break
                @case(3)
                    Tipo: Director
                @break
                @case(4)
                    Tipo: Alumno
                @break
               
            @endswitch
            </strong>
                </a>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{url('/home')}}"><i class="fa fa-user fa-fw"></i>Perfil de Usuario</a>
                        </li>
                        <li><a href="{{url('/')}}/configuracion"><i class="fa fa-gear fa-fw"></i>Configuración</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i>Cerrar</a>
                        </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </ul>
                </li>

              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header"></li>
            
            <ul class="sidebar-menu">
            <li class="header"></li>
    

            <li class="treeview">
              <a href="#">
                <i class="fa fa-child"></i>
                <span>Alumnos</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               @if(auth()->user()->is_admin)
                <li><a href="almacen/articulo"><i class="fa fa-circle-o"></i>Crear alumno</a></li>
                @endif
                @if(! auth()->user()->is_magaly)
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i>Alumnos (Todos)</a></li>
                @endif
                @if (! auth()->user()->is_magaly && ! auth()->user()->is_students)
                <li><a href="{{url('/')}}/user/grupos"><i class="fa fa-circle-o"></i>Grupos</a></li>
                @endif
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Ficha x Alumno</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                  @if(! auth()->user()->is_students && ! auth()->user()->is_magaly && !auth()->user()->is_teacher)
                    <li>
                        <a href="{{url('/grupos/asignados')}}"><i class="fa fa-circle-o"></i> Estado de cuenta</a>
                    </li>
                    <li>
                        <a href="{{url('/materias/impartir')}}"><i class="fa fa-circle-o"></i> Kárdex</a>
                    </li>                             
                    <li>
                        <a href="{{url('/tutorados/grupo')}}"><i class="fa fa-circle-o"></i> Bitácora</a>
                    </li>
                    @endif
                    @if(auth()->user()->is_admin || auth()->user()->is_principal)
                    <li>
                        <a href="{{url('/tutorados/grupo')}}"><i class="fa fa-circle-o"></i> Calificaciones</a>
                    </li>
                    @endif
                  </ul>
                  </li>
              </ul>       
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-group"></i>
                <span>Profesores</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @if(auth()->user()->is_admin)
                <li><a href="{{url('/')}}/lista/empleado"><i class="fa fa-circle-o"></i> Crear Nuevo</a></li>
                @endif
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-dashboard fa-fw"></i>
                    <span>Ficha x Profesor</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                        <a href="{{url('/grupos/asignados')}}"><i class="fa fa-circle-o"></i> Grupos</a>
                    </li>
                    <li>
                        <a href="{{url('/materias/impartir')}}"><i class="fa fa-circle-o"></i> Asignaturas</a>
                    </li>                             
                    <li>
                        <a href="{{url('/tutorados/grupo')}}"><i class="fa fa-circle-o"></i> Tutorías</a>
                    </li>
                  </ul>
                  </li>
              </ul>       
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-money fa-fw"></i>
                <span>Cobranza</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              @if(auth()->user()->is_admin)

                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-dashboard fa-fw"></i>
                    <span>Módulo de Cobros</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="{{url('/')}}/utp/concepto/create"><i class="fa fa-circle-o"></i> Cobro de Conceptos</a></li>
                    <li><a href="{{url('/')}}/utp/venta/plan/create"><i class="fa fa-circle-o"></i> Cobro de Planes</a></li>                            
                    
                  </ul>
                  </li>
                <li><a href="{{url('/')}}/utp/conceptosPago/"><i class="fa fa-circle-o"></i> Conceptos de Cobro</a></li>
                <li><a href="{{url('/')}}/utp/planesPago"><i class="fa fa-circle-o"></i> Planes de Pago</a></li>
                 <li><a href="{{url('/')}}/utp/crearCxC"><i class="fa fa-circle-o"></i> Crear CxC</a></li>
              @endif
              @if(auth()->user()->is_admin || auth()->user()->is_students)
                  <li><a href="{{url('/')}}/utp/estado/cuenta/alumno"><i class="fa fa-circle-o"></i> Estado de cuenta</a></li>
              @endif
              </ul>
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-sitemap"></i>
                <span>Académico</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="almacen/articulo"><i class="fa fa-circle-o"></i>Planes de Estudio</a></li>
                @if(auth()->user()->is_admin)
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i>Crear Kárdex x Grupo</a></li>
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i>Crear Kárdex x Alumno</a></li>
                @endif
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-edit"></i>
                    <span>Calificaciones x Grupo</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li>
                        <a href="{{url('/grupos/asignados')}}"><i class="fa fa-circle-o"></i> Seleccionar Grupo</a>
                    </li>
                    @if(auth()->user()->is_teacher)
                    <li>
                        <a href="{{url('/materias/impartir')}}"><i class="fa fa-circle-o"></i> Seleccionar Asignatura</a>
                    </li>                             
                    <li>
                        <a href="{{url('/tutorados/grupo')}}"><i class="fa fa-circle-o"></i> Ingreso de Calificaciones</a>
                    </li>
                    <li>
                        <a href="{{url('/tutorados/grupo')}}"><i class="fa fa-circle-o"></i> Imprimir Listado</a>
                    </li>
                     @endif
                  </ul>
                  </li>
              </ul>       
            </li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench fa-fw"></i>
                <span>Escolares</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              @if(auth()->user()->is_admin)
                <li><a href="almacen/articulo"><i class="fa fa-circle-o"></i> Inscripciones</a></li>
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Correos Masivos</a></li>
              @endif
              @if(auth()->user()->is_magaly)
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Agendar Aulas</a></li>
              </ul>
              @endif
            </li>

            

            
    </ul>

        </ul>
                        
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema Integrado de la UTP</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                            <div >
        <div>
            <div><h1><span class="fa fa-fire"></span> Error 404, la página solicitada no existe</h1></div>
            <a href="{{url('/')}}/configuracion">Regresar a la Página Anterior</a>
  
        </div>

    </div>
                           </div>
                        </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2020 <a href="www.incanatoit.com">IncanatoIT</a>.</strong> All rights reserved.
      </footer>

      
    <!-- jQuery 2.1.4 -->
    {!!Html::script('js/jquery-2.1.0.min.js')!!}
    {!!Html::script('js/estadosMexico.js')!!}
    @stack('usuario')
     @stack('ciclos')
      @stack('cuenta')
       @stack('caja')
    @stack('scripts')
    @stack('cobrar')
    @stack('titulacion')
    @stack('etapa1Titul')
    {!!Html::script('js/dropdown.js')!!}
 
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>