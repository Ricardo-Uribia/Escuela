<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SII-UTP</title>
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
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  
  @yield('styles')



<script type="text/javascript">
        function toggle(elemento) {
          if(elemento.value=="a") {
              document.getElementById("uno").style.display = "none";
              document.getElementById("dos").style.display = "none";
           }else{
               if(elemento.value=="b"){
                   document.getElementById("uno").style.display = "block";
                   document.getElementById("dos").style.display = "none";
               
                    }  
                }
            }
    
</script>

<script type="text/javascript">
        function toggle1(elemento) {
          if(elemento.value=="1") {
              document.getElementById("primero").style.display = "none";
              document.getElementById("segundo").style.display = "none";
           }else{
               if(elemento.value=="2"){
                   document.getElementById("primero").style.display = "block";
                   document.getElementById("segundo").style.display = "none";
               
                    }  
                }
            }
    
</script>

<script type="text/javascript">
        function toggle2(elemento) {
          if(elemento.value=="3") {
              document.getElementById("tres").style.display = "none";
              document.getElementById("cuatro").style.display = "none";
           }else{
               if(elemento.value=="4"){
                   document.getElementById("tres").style.display = "block";
                   document.getElementById("cuatro").style.display = "none";
               
                    }  
                }
            }
    
</script>

<script type="text/javascript">
        function toggle3(elemento) {
          if(elemento.value=="SI") {
              document.getElementById("cinco").style.display = "none";
              document.getElementById("seis").style.display = "none";
           }else{
               if(elemento.value=="NO"){
                   document.getElementById("cinco").style.display = "block";
                   document.getElementById("seis").style.display = "none";
               
                    }  
                }
            }
            
            
            
    
</script>




<script type="text/javascript">
        function toggle4(elemento) {
          if(elemento.value=="7") {
              document.getElementById("siete").style.display = "none";
              document.getElementById("ocho").style.display = "none";
           }else{
               if(elemento.value=="8"){
                   document.getElementById("siete").style.display = "block";
                   document.getElementById("ocho").style.display = "none";
               
                    }  
                }
            }
            
            
            
    
</script>


 <script type="text/javascript"> 
function habilitar(obj) { 
  var hab; 
  frm=obj.form; 
  num=obj.selectedIndex; 
  if (num==1) hab=true; 
  else if (num==2) hab=false; 
  frm.hijos1.disabled=hab; 
  frm.hijos2.disabled=hab; 
  frm.hijos3.disabled=hab; 
  frm.hijos4.disabled=hab; 
} 
</script>

<script type="text/javascript">
function mostrar(id) {
    if (id == "") {
        $("").show();
        $("#turismo").hide();
        $("#administracion").hide();
    }

    if (id == "turismo") {
        $("").hide();
        $("#turismo").show();
        $("#administracion").hide();
    }

    if (id == "administracion") {
        $("").hide();
        $("#turismo").hide();
        $("#administracion").show();
    }

}


</script>

<script type="text/javascript">
function parciales(id) {
    if (id == "") {
        $("").show();
        $("#primerParcial").hide();
        $("#segundoParcial").hide();
        $("#tercerParcial").hide();
        $("#asesorias").hide();
        $("#asesorias2").hide();
        $("#ordinario").hide();
        $("#recuperativo").hide();
        $("#especial").hide();

    }

    if (id == "primerParcial") {
        $("").hide();
        $("#primerParcial").show();
        $("#segundoParcial").hide();
        $("#tercerParcial").hide();
        $("#asesorias").hide();
        $("#asesorias2").hide();
        $("#ordinario").hide();
        $("#recuperativo").hide();
        $("#especial").hide();

    }

   if (id == "segundoParcial") {
        $("").hide();
        $("#primerParcial").hide();
        $("#segundoParcial").show();
        $("#tercerParcial").hide();
        $("#asesorias").hide();
        $("#asesorias2").hide();
        $("#ordinario").hide();
        $("#recuperativo").hide();
        $("#especial").hide();


    
    }

    if (id == "tercerParcial") {
        $("").hide();
        $("#primerParcial").hide();
        $("#segundoParcial").hide();
        $("#tercerParcial").show();
        $("#asesorias").hide();
        $("#asesorias2").hide();
        $("#ordinario").hide();
        $("#recuperativo").hide();
        $("#especial").hide();


    
    }

    if (id == "asesorias") {
        $("").hide();
        $("#primerParcial").hide();
        $("#segundoParcial").hide();
        $("#tercerParcial").hide();
        $("#asesorias").show();
        $("#asesorias2").hide();
        $("#ordinario").hide();
        $("#recuperativo").hide();
        $("#especial").hide();


    
    }

    if (id == "asesorias2") {
        $("").hide();
        $("#primerParcial").hide();
        $("#segundoParcial").hide();
        $("#tercerParcial").hide();
        $("#asesorias").hide();
        $("#asesorias2").show();
        $("#ordinario").hide();
        $("#recuperativo").hide();
        $("#especial").hide();

    
    }

    if (id == "ordinario") {
        $("").hide();
        $("#primerParcial").hide();
        $("#segundoParcial").hide();
        $("#tercerParcial").hide();
        $("#asesorias").hide();
        $("#asesorias2").hide();
        $("#ordinario").show();
        $("#recuperativo").hide();
        $("#especial").hide();

    
    }

    if (id == "recuperativo") {
        $("").hide();
        $("#primerParcial").hide();
        $("#segundoParcial").hide();
        $("#tercerParcial").hide();
        $("#asesorias").hide();
        $("#asesorias2").hide();
        $("#ordinario").hide();
        $("#recuperativo").show();
        $("#especial").hide();

    
    }

    if (id == "especial") {
        $("").hide();
        $("#primerParcial").hide();
        $("#segundoParcial").hide();
        $("#tercerParcial").hide();
        $("#asesorias").hide();
        $("#asesorias2").hide();
        $("#ordinario").hide();
        $("#recuperativo").hide();
        $("#especial").show();
    }
}
</script>

<script type="text/javascript">
function asig(id) {
      if (id == "") {
        $("").show();
        $("#1").hide();
        $("#2").hide();
        $("#3").hide();

    }
    
    if (id == "1") {
        $("").hide();
        $("#1").show();
        $("#2").hide();
        $("#3").hide();
        
    }

    if (id == "2") {
        $("").hide();
        $("#1").hide();
        $("#2").show();
        $("#3").hide();
        
    }

    if (id == "3") {
        $("").hide();
        $("#1").hide();
        $("#2").hide();
        $("#3").show();
        
    }

}
</script>


<script type="text/javascript">
function tutores(id) {
    if (id == "primerParcial") {
        $("#primerParcial").show();
        $("#segundoParcial").hide();
        $("#tercerParcial").hide();
        $("#asesorias").hide();
    }

    if (id == "segundoParcial") {
        $("#primerParcial").hide();
        $("#segundoParcial").show();
        $("#tercerParcial").hide();
        $("#asesorias").hide();
    }

    if (id == "administracion") {
        $("#estudiante").hide();
        $("#turismo").hide();
        $("#administracion").show();
        $("#paro").hide();
    }

    if (id == "paro") {
        $("#estudiante").hide();
        $("#turismo").hide();
        $("#administracion").hide();
        $("#paro").show();
    }
}
</script>


  </head>
  
  <body class="hold-transition skin-blue sidebar-mini">
      
      
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{url('/home')}}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>UT</b>P</span>
          <!-- logo for regular state and mobile devices -->
          <span class="navbar-brand"><img src="{{asset('/img/logotitulo.png')}}" height="35px" width="120px" ></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-expand-lg fixed-top" role="navigation">
            
            
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
             <?php

                use App\Models\Ciclo;

                $ciclos= Ciclo::all();

                if (\Session::get('ciclos')) {
                  $idCiclos = \Session::get('ciclos')->idCiclo;
                }else{

                  $idCiclos = "";
                }
                ?>
              <br>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
               <input type="hidden" value="{{csrf_token()}}" id="tokenCiclo"/>
                  <select class="form-control"  id="idCicloGlobal" onchange="buscarusuario();">
                      
                      <option value="">Selecciona</option>
                        @foreach($ciclos as $ciclo)
                        
                          <option value="{{$ciclo->idCiclo}}">{{$ciclo->descripcion}} </option> 
                        @endforeach   
                  </select>
                 </div>

@push('ciclo_principal')
<script>
 $(document).ready(function(){

    function cargarpais()
    {
       ver =  $("#idCicloGlobal option:eq(<?= $idCiclos ?>)").prop('selected', true);  
       console.log(ver); 
    }

cargarpais();

});

function buscarusuario(){


    var ciclo_id = $("#idCicloGlobal").val();

    if (ciclo_id!= "") {
      var screen = $('#loading-screenCiclo');
      var token = $("#tokenCiclo").val();
        configureLoadingScreen(screen);

                $.ajax({
                url: "<?php echo url('/utp/obtener/datos/idCiclo/"+ciclo_id+"') ?>",
                type:'get',
             
              success:function(data){
                  location.reload();
              }
    });

    }      

  }



</script>



@endpush
          <!-- Navbar Right Menu -->
          
          
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              
              
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <span class="hidden-xs"><strong>Hola: </strong>{{Auth::user()->name }}</span>
                    <strong>
            @switch (Auth::user()->role)
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
            </strong>
                </a>
                <!--NOTIFICION B13-->

          <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                        <span class="label label-warning">3</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Tines 3 notificaciones</li>
                        <li>
                            <!-- Inner Menu: contains the notifications -->
                            <ul class="menu">
                                <li><!-- start notification -->
                                    <a href="#">
                                        <i class="fa fa-users text-aqua"></i> <STRONG>LES RECUERDO QUE </STRONG>
                                    </a>
                                </li><!-- end notification -->
                            </ul>
                        </li>
                         <div class="panel-body">
                              <p>
                             <div class="alert alert-danger" role="alert"> JULIÁN: 2. Redireccionar el buscador al grupo de origen; 3. Que registre sólo alumnos con la misma carrera del grupo
                            </div>
                            </p>
                            <p>
                            <div class="alert alert-danger" role="alert"> FELIPE... 1. NO SE PUEDE ELIMINAR UN REGISTRO EN EL LISTADO DE EMPLEADOS. HAY QUE ACTUALIZAR LA PÁGINA PARA QUE SE APLIQUE LA ELIMINACIÓN>>> 2. COBRANZA (REVISAR TODO)
                            </div>
                            </p>
                            <p>
                            <div class="alert alert-warning" role="alert"> TODOS... Usuarios (URGE... No se hagan!!!)
                            </div>
                            </p>
                                                            
                             </div>
                        <li class="footer"><a href="#">Ver todos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="{{url('/home')}}"><i class="fa fa-user fa-fw"></i>Perfil de Usuario</a>
                        </li>
                          @if(! auth()->user()->is_students)
                            <li><a href="{{url('/')}}/configuracion"><i class="fa fa-gear fa-fw"></i>Configuración</a>
                        @endif
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
                <!-- Botón para ir a Alumnos (todos) -->
                    <a href="{{url('lista')}}"><button type="bbtn btn-warning" class="btn btn-warning">Buscar alumno</button>

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
    
        @if(! auth()->user()->is_teacher)
            <li class="treeview">
              <a href="#">
                <i class="fa fa-child"></i>
                <span>Alumnos(as)</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               @if(auth()->user()->is_admin)
                <li><a href="{{url('/crear/alumno')}}"><i class="fa fa-circle-o"></i>Crear alumno</a></li>
                @endif
                @if(! auth()->user()->is_magaly)
                <li><a href="{{url('lista')}}"><i class="fa fa-circle-o"></i>Alumnos (Todos)</a></li>
                @endif
                @if (! auth()->user()->is_magaly && ! auth()->user()->is_students)
                <li><a href="{{url('grupos')}}"><i class="fa fa-circle-o"></i>Grupos</a></li>
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
                        <a href="{{url('/utp/estado/cuenta/alumno')}}"><i class="fa fa-circle-o"></i> Estado de cuenta</a>
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
            @endif
            
            @if( ! auth()->user()->is_teacher)
            <li class="treeview">
              <a href="#">
                <i class="fa fa-group"></i>
                <span>Personal Adm./Docente</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                @if(auth()->user()->is_admin || auth()->user()->is_teacher)
                <li><a href="{{url('/')}}/empleado"><i class="fa fa-circle-o"></i> Listado de Empleados</a></li>
                
               
                <!--li class="treeview">
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
                    <li>
                        <a href="{{url('/tutorados/grupo')}}"><i class="fa fa-circle-o"></i> Empresas</a>
                    </li>
                  </ul>
                  </li--->
                   
                  @endif
              </ul>       
            </li>
            @endif
        @if( ! auth()->user()->is_teacher)
            <li class="treeview">
              <a href="#">
                <i class="fa fa-money fa-fw"></i>
                <span>Cobranza</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
               

                <!--<li class="treeview">
                  <a href="#">
                    <i class="fa fa-dashboard fa-fw"></i>
                    <span>Módulo de Cobros</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  @if(auth()->user()->is_magaly || auth()->user()->is_admin)
                  <ul class="treeview-menu">
                    <li><a href="{{url('/')}}/utp/concepto/create"><i class="fa fa-circle-o"></i> Cobro de Conceptos</a></li>
                    <li><a href="{{url('/')}}/utp/venta/plan/create"><i class="fa fa-circle-o"></i> Cobro de Planes</a></li>                            
                  </ul>
                  </li>-->
                 @if(auth()->user()->is_admin)
                 <li><a href="{{url('/')}}/utp/venta/plan/create"><i class="fa fa-circle-o"></i> Modulo de Cobro</a></li>
                <li><a href="{{url('/')}}/utp/conceptosPago/"><i class="fa fa-circle-o"></i> Conceptos de Cobro</a></li>
                <li><a href="{{url('/')}}/configurar/planes"><i class="fa fa-circle-o"></i> Planes de Pago</a></li>
                 <li><a href="{{url('/')}}/utp/crearCxC"><i class="fa fa-circle-o"></i> Crear CxC</a></li>
              @endif
              @endif
              @if(auth()->user()->is_admin || auth()->user()->is_students)
                  <li><a href="{{url('/')}}/utp/venta/lista/venta/planes"><i class="fa fa-circle-o"></i> Estado de cuenta</a></li>
              @endif
              </ul>
            </li>
             @endif


<!--           Rutas del Módulo Académico          -->

            <li class="treeview">
              <a href="#"><i class="fa fa-sitemap"></i><span>Académico</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                   <li class="active"><a href="{{ url('/carga_academica')}}"><i class="fa fa-circle-o"></i><span>Carga Academica</span></a></li>
                  @if(auth()->user()->is_admin)
                   <li class="active"><a href="{{ url('/planes')}}"><i class="fa fa-circle-o"></i><span>Planes de estudio</span></a></li>
                  @endif
                @if(auth()->user()->is_admin)
                  <li class="active"><a href="{{url('/kardex/grupos')}}"><i class="fa fa-circle-o"></i>Crear Kárdex x Grupo</a></li>
                  <li class="active"><a href="{{ url('almacen/categoria') }}"><i class="fa fa-circle-o"></i>Crear Kárdex x Alumno</a></li>
                @endif

                    <li class="treeview">
                      <a href="#"><i class="fa fa-dashboard fa-fw"></i><span>Control de Calificaciones</span><i class="fa fa-angle-left pull-right"></i></a>

                  <ul class="treeview-menu">
                    <li><a href="{{url('/ponderacion')}}"><i class="fa fa-circle-o"></i> Ponderación</a></li>
                    
                    <li><a href="{{url('/registro/calif/profesores')}}"><i class="fa fa-circle-o"></i> Registro de Calificaciones</a></li>

                    <li><a href="{{url('/boleta/final')}}"><i class="fa fa-circle-o"></i> Boleta Final</a></li>

                    <li><a href="{{url('/reporte/tutores')}}"><i class="fa fa-circle-o"></i> Reporte de Tutores</a></li>
                  </ul>
                  </li>

                  @if(auth()->user()->is_admin)
                  <li class="treeview">
                  <a href="#"><i class="fa fa-gear"></i><span>Configuración</span><i class="fa fa-angle-left pull-right"></i></a>

                  
                  <ul class="treeview-menu">
                    <li class="active"><a href="{{url('momento')}}"><i class="fa fa-circle-o"></i>Momentos</a></li>

                    <li class="active"><a href="{{url('/criterio')}}"><i class="fa fa-circle-o"></i>Criterios</a></li>                             
                  
                  </ul>
                  </li>
                  @endif
                  </ul>
                  </li>

    <!--- Aquí termina las rutas del Módulo Académico ---->
    
    
        @if( ! auth()->user()->is_teacher)
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
                <li><a href="{{url('/')}}/utp/titulacion/alumnos"><i class="fa fa-circle-o"></i> Titulación</a></li>
                <li><a href="{{url('/configurar/empresas')}}"><i class="fa fa-circle-o"></i>EMPRESAS</a></li>
              @endif
               @if(auth()->user()->is_students)
                <li><a href="{{url('/')}}/utp/titulacion/alumno-{{Auth::user()->alumnos[0]->id}}"><i class="fa fa-circle-o"></i> Titulación</a></li>
              @endif
              
               <!-- <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Agendar Aulas</a></li>-->
              </ul>

            </li>
        @endif
            
    <!--RicardoAdministrador-->
            
       @if(! auth()->user()->is_teacher )     
        <li class="treeview">
              <a href="#">
                    <i class="fa fa-mortar-board fa-fw"></i>
                    <span>Vinculacion</span>
                    <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                        @if(auth()->user()->is_admin)
                         <!--li><a href="{{ url('alumnos_villas/create')}}"><i class=""></i>Registro villa</a></li-->
                        <li><a href="{{ url('seguimiento_estadia')}}"><i class="fa fa-star"></i>Estadia</a></li>
                         <li><a href="{{ url('grupos_seguimiento_egresados')}}"><i class="fa fa-graduation-cap"></i>Seguimiento-Egresados</a></li>
                            <li><a href="{{url('eventoacti')}}"><i class="fa fa-heartbeat"></i> Actividades-Extracurriculares</a></li>
                            <li><a href="{{ url('catalogo_villas')}}"><i class="fa fa-home"></i>Villas</a></li>
                            
                            
                        @endif
                        
                                        
   
                    </ul>
              
              

        </li>
    @endif
            
    <!-------------------------RicardoAdministrador----------------------------------->
    
    @if(! auth()->user()->is_teacher )
     <li class="treeview">
      <a href="#">
          
          <i class="fa fa-pencil-square-o"></i>
              <span>Evaluación Doc.</span>
                <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                        @if(auth()->user()->is_admin)
                    <li><a href="{{url('planed')}}"><i class="fa fa-gear"></i>Configuración</a>
                    </li>
                    @endif
                      
                        @if(auth()->user()->is_admin)
                            <li><a href="{{url('vistagruposed')}}"><i class="fa fa-group"></i>Grupo</a></li>
                        @endif
                
                    <li class="treeview">
                    <a href="#">
                    <i class="fa  fa-bar-chart"></i>
                    <span>Reportes</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                  @if(! auth()->user()->is_students && !auth()->user()->is_teacher)
                    <li>
                        <a href="{{url('reportegrupo')}}"><i class="fa fa-circle-o"></i>Rep.Grupo</a>
                        <a href="{{url('reporteprofe')}}"><i class="fa fa-circle-o"></i>Rep.Profesor</a>
                    </li>
                                                 
                    @endif
                  </ul>
                  </li>
              </ul>       
            </li>
            @endif


    <!-------------------evaluacion docente------------------------------------------------>
            
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
                  <h3 class="box-title">Sistema Integral de Información de la UTP</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                  
    <section class="content-header">

     @if(session('info'))
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="alert alert-success">
                    {{ session('info' )}}
                </div>
            </div>
        </div>
    </div>

    @endif
  </section>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                            <div >
        <div>
            <div>@yield('menuTabs')</div>
            <div>@yield('principal')</div>
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
<style type="text/css">
    
#loading-screenCiclo {
  background-color: rgba(25,25,25,0.7);
  width: 85%;
  height: 85%;
  position: absolute;
  z-index: 9999;
  top: 10%;
  margin-left: 240px;
  margin-right: 150px;
  bottom: 10%;
  text-align: center;
}
#loading-screenCiclo img {
  width: 100px;
  height: 100px;
  position: relative;
  margin-top: 25px;
  margin-left: 25px;
  top: 45%;
}
</style>
<div id="loading-screenCiclo" style="display:none">
    <img src="{{asset('/img/spinning-circles.svg')}}">
</div>
      
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
    @stack('ciclo_principal')
    @stack('filtroCiclo')
    @stack('ventaPlan')
    @stack('listaDataTable')
    @stack('gruposDataTable')
    @stack('nivelesDataTable')
    @stack('planesDataTable')
    @stack('datatablesconceptosPago')
    @stack('dataTableCiclos')
    @stack('dataTablePlanesMST')
    @stack('ventaPlan')
    @stack('estadoCuenta')
    @stack('prueba')
    @stack('editEmpleado')
    @stack('dataTableEmpresa')
    @stack('dataTableConceptoPago')
    @stack('dataTableModalidad')
    @stack('dataTablesPlanesVenta')
    @stack('alumnos')
    @stack('dataTableProfeGrupo')
    @stack('registro')
    @stack('kardex')
    @stack('registro_calif')
    {!!Html::script('js/dropdown.js')!!}
    
    
    <script src="{{asset('js/jquery-2.1.0.min.js')}}"></script>
    <script src="{{asset('js_academico/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js_academico/dropdown_asignatura_profesor.js')}}"></script>
    <script src="{{asset('js_academico/dropdown_asignatura.js')}}"></script>
    <script src="{{asset('js_academico/dropdown_nivel.js')}}"></script>
    <!--<script src="{{asset('js_academico/dropdown_grupo.js')}}"></script>-->
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>