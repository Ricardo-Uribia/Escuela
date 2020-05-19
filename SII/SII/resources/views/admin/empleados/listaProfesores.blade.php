@extends('layouts.admin')

@section('principal')
<div class="content">
<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
        <h3>Listado de Profesores(as) 
        <a href="{{url('/crear/Empleado')}}">
            <br>
            <br>
            <button class="btn btn-success">Nuevo Empleado</button></a>
            <br>
            
        <!--a href="{{url('/crear/profesor')}}"><button class="btn btn-success">Nuevo Profesor</button></a></h3-->
        
        <select name="verListaDe" id="verListaDe" class="navbar-form navbar-left">
            <option id="prof" value="3">Profesores</option>
            <option id="emp" value="2">Empleados</option>
            <option id="all" value="1">Todos</option>
        </select> 
    </div>
</div>


<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
                </div>

                 @if(Session::has('message'))
                          <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" arial-label="Close"> <span aria-hidden="true">x</span></button>{{Session::get('message')}}
                          </div>       
                     @endif
                <!-- /.col-lg-12 -->
            </div>
        </div>

<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive" id="tabTable">
            <table class="table table-striped table-bordered table-condensed table-hover" id="miTabla">
                <thead>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Cédula Profecional</th>
                    <th>Especialidad</th>
                    <th>Nivel de Estudios</th>
                    <th>Acciones</th>
                </thead> 
                <thead>
                    <tbody id="contenido">
                      
                
                    </tbody>
                </thead>
            </table>
        </div>   
    </div>
</div>
                  
<nav aria-label="...">
  <ul class="pager">
    <li class="previous"><a href="#"><span aria-hidden="true">&larr;</span> Anterior </a></li>
    <li class="next"><a href="#"> Siguiente <span aria-hidden="true">&rarr;</span></a></li>
  </ul>
</nav>

 </div>

<style type="text/css">
    
#loading-screen {
  background-color: rgba(25,25,25,0.7);
  height: 90%;
  width: 80%;
  position: fixed;
  z-index: 9999;
  top: 10%;
  bottom: 10%;
  text-align: center;
}
#loading-screen img {
  width: 100px;
  height: 100px;
  position: relative;
  margin-top: 25px;
  margin-left: 25px;
  top: 45%;
}
</style>
<div id="loading-screen" style="display:none">
    <img src="{{url('')}}/img/spinning-circles.svg">
</div>


@endsection

