@extends('layouts.admin')

@section('contenido')

<br>  
  <div class="row">
    <div class="col-md-12">
      @if(Session::has('success'))                          
        <div class="alert alert-success alert-dismissible" role="alert">
            <p class="text-center">{{Session::get('success')}}</p>
        </div> 
      @endif
      {{-- Tabla de alumnos que pertenecen al grupo --}}
      <div class="card border-neutral">  
        <div class="card-header">        
          <h4 class="inline-block" style="padding-left: 10px">Alumnos <span class="badge badge-danger">Todos</span></h4>        
          <a href="{{url('/admin/alumnos/createForm')}}">
            <button class="btn-neutral sys-background-color float-right" style="margin-right: 10px">AGREGAR ALUMNO</button>
          </a>              
        </div>
        <div class="card-body p-0">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-sys">      
                  <tr align="center">
                    <th style="width: 10px">#</th>
                    <th style="width: 10%">Foto</th>
                    <th style="width: 10%">Folio</th>
                    <th style="width: 10%">Matrìcula</th>
                    <th>Nombres</th>                                       
                    <th>Status</th>
                    <th>Nivel</th>                                        
                    <th>Grupo</th>
                    <th>Editar</th>
                  </tr> 
                  @foreach($alumnos as $key => $alumno)           
                    <tr>
                      <td>{{$key+1}}</td>
                      <td>                                  
                        @if($alumno->fotografia != null)
                          <img src="{{asset("CODE_DATA/storage".App\Services\Internal\DocumentStatements::$PATH_ALUMN_IMG)."/".$alumno->fotografia}}" class="rounded img-fluid">
                        @else
                          <small>No cuenta con fotografia</small>
                        @endif
                      </td>
                      <td>{{$alumno->folio->folio}}</td>
                      <td>{{$alumno->matricula}}</td>
                      <td>{{$alumno->getNombreCompleto()}}</td>
                      <td>{{$alumno->cfgstatus->descripcion}}</td>
                      <td>
                        {{$alumno->grupos->last()->carrera->nivel->nivel}}
                      </td>
                      <td>{{$alumno->grupos->pluck('codigo')->last()}}</td>
                      <td>
                        <form action="{{url('/admin/alumnos/updateForm')}}" method="POST">
                          @csrf
                          <input type="hidden" name="alumno_id" value="{{$alumno->id}}">
                          <input type="hidden" name="tipo_edicion" value="info">
                          <button type="submit" class="btn-neutral sys-background-color" title="Editar informaci車n del alumno">informaci車n</button>
                        </form>   
                        <form action="{{url('/admin/alumnos/updateForm')}}" method="POST">
                           @csrf
                          <input type="hidden" name="alumno_id" value="{{$alumno->id}}">
                          <input type="hidden" name="tipo_edicion" value="doctos">
                          <button type="submit" class="btn-neutral btn-secondary"title="Editar Documentos del alumnos" value="doctos" >Documentos</button>
                        </form>                                                 
                      </td>
                    </tr>    
                  @endforeach        
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer">{{$alumnos->links()}}</div>
      </div>      
    </div>
  </div>      
@endsection

