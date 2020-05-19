    <ul class="sidebar-menu">
            <li class="header"></li>
         @if(auth()->check())

            <li class="treeview">
              <a href="#">
                <i class="fa fa-child"></i>
                <span>Alumnos(as)</span>
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
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i>Grupos</a></li>
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
                <li><a href="almacen/articulo"><i class="fa fa-circle-o"></i> Módulo de Cobros</a></li>
                <li><a href="{{url('cobranza/conceptos')}}"><i class="fa fa-circle-o"></i> Conceptos de Cobro</a></li>
                <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Planes de Pago</a></li>
                 <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Crear CxC</a></li>
              @endif
              @if(auth()->user()->is_admin || auth()->user()->is_students)
                  <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Estado de cuenta</a></li>
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
                <li><a href="kardex/grupos"><i class="fa fa-circle-o"></i>Crear Kárdex x Grupo</a></li>
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
     
@else

@endif