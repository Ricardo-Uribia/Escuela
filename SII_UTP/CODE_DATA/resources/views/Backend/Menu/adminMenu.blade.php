<!-- <aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
      <li class="header"></li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-child"></i>
          <span>Alumnos(as)</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          Todos)</a></li>
          <li><a href=""><i class="fa fa-circle-o"></i>Crear alumno</a></li>
          <li><a href="{{url('/admin/grupos')}}"><i class="fa fa-circle-o"></i>Grupos</a></li>                
          <li class="treeview">
            <a href="#">
              <i class="fa fa-edit"></i>
              <span>Ficha x Alumno</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li>
                <a href="{{asset('/utp/estado/cuenta/alumno')}}"><i class="fa fa-circle-o"></i> Estado de cuenta</a>
              </li>
              <li>
                <a href="{{asset('/materias/impartir')}}"><i class="fa fa-circle-o"></i> Kárdex</a>
              </li>                             
              <li>
                <a href="{{asset('/tutorados/grupo')}}"><i class="fa fa-circle-o"></i> Bitácora</a>
              </li>
              <li>
                <a href="{{asset('/tutorados/grupo')}}"><i class="fa fa-circle-o"></i> Calificaciones</a>
              </li>
            </ul>
          </li>
        </ul>  
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-group"></i>
          <span>Personal Adm./Docente</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('/admin/list-empleados')}}"><i class="fa fa-circle-o"></i> Listado de Empleados</a></li>
        </ul>       
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-money fa-fw"></i>
          <span>Cobranza</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{url('/admin/utp/venta/plan/create')}}"><i class="fa fa-circle-o"></i> Modulo de Cobro</a></li>
          <li><a href="{{url('/admin/conceptos/cobro')}}"><i class="fa fa-circle-o"></i> Conceptos de Cobro</a></li>
          <li><a href="{{url('/admin/planes/pago')}}"><i class="fa fa-circle-o"></i> Planes de Pago</a></li>
          <li><a href="{{url('')}}/"><i class="fa fa-circle-o"></i> Crear CxC</a></li>
          <li><a href="{{url('/admin/utp/venta/lista/venta/planes')}}"><i class="fa fa-circle-o"></i> Estado de cuenta</a></li>
        </ul>
      </li>
- Aquí termina las rutas de los Módulos Alumno, Personal docente, cobranza --
Empieza rutas del Módulo Académico
      <li class="treeview">
        <a href="#"><i class="fa fa-sitemap"></i><span>Académico</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ asset('/carga_academica')}}"><i class="fa fa-circle-o"></i><span>Carga Academica</span></a></li>
          <li class="active"><a href="{{ asset('/planes')}}"><i class="fa fa-circle-o"></i><span>Planes de estudio</span></a></li>
          <li class="active"><a href="{{asset('/kardex/grupos')}}"><i class="fa fa-circle-o"></i>Crear Kárdex x Grupo</a></li>
          <li class="active"><a href="{{ asset('almacen/categoria') }}"><i class="fa fa-circle-o"></i>Crear Kárdex x Alumno</a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-dashboard fa-fw"></i><span>Control de Calificaciones</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{asset('/ponderacion')}}"><i class="fa fa-circle-o"></i> Ponderación</a></li>         
                <li><a href="{{asset('/registro/calif/profesores')}}"><i class="fa fa-circle-o"></i> Registro de Calificaciones</a></li>
                <li><a href="{{asset('/boleta/final')}}"><i class="fa fa-circle-o"></i> Boleta Final</a></li>
                <li><a href="{{asset('/reporte/tutores')}}"><i class="fa fa-circle-o"></i> Reporte de Tutores</a></li>
              </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-gear"></i><span>Configuración</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li class="active"><a href="{{asset('momento')}}"><i class="fa fa-circle-o"></i>Momentos</a></li>
                <li class="active"><a href="{{asset('/criterio')}}"><i class="fa fa-circle-o"></i>Criterios</a></li>
              </ul>
          </li>
        </ul>
      </li>
- Aquí termina las rutas del Módulo Académico --
Empieza rutas del Módulo Escolares      
      <li class="treeview">
        <a href="#">
          <i class="fa fa-wrench fa-fw"></i>
          <span>Escolares</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="almacen/articulo"><i class="fa fa-circle-o"></i> Inscripciones</a></li>
          <li><a href="almacen/categoria"><i class="fa fa-circle-o"></i> Correos Masivos</a></li>
          <li><a href="{{asset('/')}}/utp/titulacion/alumnos"><i class="fa fa-circle-o"></i> Titulación</a></li>
          <li><a href="{{asset('/configurar/empresas')}}"><i class="fa fa-circle-o"></i>EMPRESAS</a></li>
          <li><a href="{{asset('/')}}/utp/titulacion/alumno"><i class="fa fa-circle-o"></i> Titulación</a></li>
        </ul>
      </li>
- Aquí termina las rutas del Módulo Escolares --
Empieza rutas del Módulo Vinculacion
      <li class="treeview">
        <a href="#">
          <i class="fa fa-mortar-board fa-fw"></i>
          <span>Vinculacion</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ asset('seguimiento_estadia')}}"><i class="fa fa-star"></i>Estadia</a></li>
          <li><a href="{{ asset('grupos_seguimiento_egresados')}}"><i class="fa fa-graduation-cap"></i>Seguimiento-Egresados</a></li>
          <li><a href="{{asset('eventoacti')}}"><i class="fa fa-heartbeat"></i> Actividades-Extracurriculares</a></li>
          <li><a href="{{ asset('catalogo_villas')}}"><i class="fa fa-home"></i>Villas</a></li>
        </ul>
      </li>
- Aquí termina las rutas del Módulo Vinculacion --
Empieza rutas del Módulo Evaluacion Docente
      <li class="treeview">
        <a href="#"> 
          <i class="fa fa-pencil-square-o"></i>
          <span>Evaluación Doc.</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{asset('planed')}}"><i class="fa fa-gear"></i>Configuración</a></li>
          <li><a href="{{asset('vistagruposed')}}"><i class="fa fa-group"></i>Grupo</a></li>
          <li class="treeview">
            <a href="#">
              <i class="fa  fa-bar-chart"></i>
              <span>Reportes</span>
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">     
              <li>
                <a href="{{asset('reportegrupo')}}"><i class="fa fa-circle-o"></i>Rep.Grupo</a>
                <a href="{{asset('reporteprofe')}}"><i class="fa fa-circle-o"></i>Rep.Profesor</a>
              </li>
            </ul>
          </li>
        </ul>       
      </li>
- Aquí termina las rutas del Módulo Vinculacion --
Empieza rutas del Módulo Evaluacion Docente
    </ul>
  </section>
</aside>

 -->

  <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<!--           <li class="nav-item has-treeview menu-open">
  <a href="#" class="nav-link active">
    <i class="nav-icon fa fa-bell"></i>
    <p>
      Dashboard
      <i class="right fa fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <li class="nav-item">
      <a href="./index.html" class="nav-link active">
        <i class="fa fa-circle-o nav-icon"></i>
        <p>Dashboard v1</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./index2.html" class="nav-link">
        <i class="fa fa-circle-o nav-icon"></i>
        <p>Dashboard v2</p>
      </a>
    </li>
    <li class="nav-item">
      <a href="./index3.html" class="nav-link">
        <i class="fa fa-circle-o nav-icon"></i>
        <p>Dashboard v3</p>
      </a>
    </li>
  </ul>
</li> -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-child"></i>
              <p>
               Alumnos
                <i class="fa fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/alumnos/createForm')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Crear Alumno</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/alumnos/index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Alumnos (Todos)</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/grupos')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Grupos</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-pencil-square-o"></i>
                    <p>
                    Ficha x Alumno
                    <i class="fa fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/layout/top-nav.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Estado de Cuenta</p>
                      </a>
                    </li>
                
                    <li class="nav-item">
                      <a href="pages/layout/top-nav.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Kárdex</p>
                      </a>
                    </li>
                
                    <li class="nav-item">
                      <a href="pages/layout/top-nav.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Bitácora</p>
                      </a>
                    </li>
                
                    <li class="nav-item">
                      <a href="pages/layout/top-nav.html" class="nav-link">
                        <i class="fa fa-circle-o nav-icon"></i>
                        <p>Calificaciones</p>
                      </a>
                    </li>
                </ul>
              </li>  
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-group"></i>
              <p>
                Personal Adm/Docente
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/list-empleados')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Lista de Empleados</p>
                </a>
              </li>
            </ul>
          </li>
                    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Cobranza
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/cobranza/')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Módulo de Cobro</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/conceptos/cobro')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Concepto de Cobro</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/planes/pago')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Planes de Pago</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/crearcxc/alumno')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Crear CxC</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/UI/modals.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Estado de cuenta</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-sitemap"></i>
              <p>
                Académico
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/forms/general.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Carga Académica</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/advanced.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Planes de Estudio</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/editors.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Crear Kárdex x Grupo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/forms/validation.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Crear Kárdex x Alumno</p>
                </a>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                    Control de Calificaciones
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Ponderación</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Registro de Calificaciones</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Boleta Final</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Reporte de Tutores</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa fa-gear"></i>
                  <p>
                    Configuraciones
                    <i class="fa fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Momento</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                      <i class="fa fa-circle-o nav-icon"></i>
                      <p>Criterios</p>
                    </a>
                  </li>
                </ul>
              </li>
               
            
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-wrench"></i>
              <p>
                Escolares
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Inscripciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Correos Masivos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Titulación</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Empresas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-mortar-board"></i>
              <p>
                Vinculación
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="fa fa-star nav-icon"></i>
                  <p>Estadía</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="fa fa-graduation-cap nav-icon"></i>
                  <p>Seguimiento-Egresados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="fa fa-heartbeat nav-icon"></i>
                  <p>Actividades-Extracurriculares</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="fa fa-home nav-icon"></i>
                  <p>Villas</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-pencil-square-o"></i>
              <p>
                Evaluación Doc.
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="fa fa-gear nav-icon"></i>
                  <p>Configuración</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="fa fa-group nav-icon"></i>
                  <p>Grupo</p>
                </a>
              </li>
            
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="nav-icon fa  fa-bar-chart"></i>
                    <p>
                    Reportes
                    <i class="fa fa-angle-left right"></i>
                    <span class="badge badge-info right">6</span>
                  </p>
                </a>
                <ul class="nav nav-treeview">
            
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Rep. Grupo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/jsgrid.html" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Rep. Profesor</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
         <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gear fa-fw"></i>
              <p>
                Configuraciones 
                <i class="fa fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/admin/ciclos/index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Ciclo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/niveles/index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Carrera</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/cajas/index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>    
                  <p>Caja</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('/admin/cuentas/index')}}" class="nav-link">
                  <i class="fa fa-circle-o nav-icon"></i>
                  <p>Cuenta</p>
                </a>
              </li>
            </ul>
          </li>
      </nav>