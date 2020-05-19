<aside class="main-sidebar">
  <section class="sidebar">
    <ul class="sidebar-menu">
<!--         Empieza rutas del Módulo Académico          -->
      <li class="treeview">
        <a href="#"><i class="fa fa-sitemap"></i><span>Académico</span><i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ asset('/carga_academica')}}"><i class="fa fa-circle-o"></i><span>Carga Academica</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-dashboard fa-fw"></i><span>Control de Calificaciones</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{asset('/ponderacion')}}"><i class="fa fa-circle-o"></i> Ponderación</a></li>         
                <li><a href="{{asset('/registro/calif/profesores')}}"><i class="fa fa-circle-o"></i> Registro de Calificaciones</a></li>
                <li><a href="{{asset('/boleta/final')}}"><i class="fa fa-circle-o"></i> Boleta Final</a></li>
                <li><a href="{{asset('/reporte/tutores')}}"><i class="fa fa-circle-o"></i> Reporte de Tutores</a></li>
              </ul>
          </li>
        </ul>
      </li>
<!--- Aquí termina las rutas del Módulo Académico ---->
    </ul>
  </section>
</aside>
