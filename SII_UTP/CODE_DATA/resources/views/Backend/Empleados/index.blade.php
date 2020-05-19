@extends('layouts.admin')
@section('contenido')
@if(Session::has('success'))
	<div class="small-box bg-success">
		<div class="card-header">
			<center><p>{{Session::get('success')}}</p></center>
		</div>
	</div>
@endif
@if(Session::has('error'))
  <div class="small-box bg-danger">
    <div class="card-header">
      <center><p>{{Session::get('error')}}</p></center>
    </div>
  </div>
@endif
<div class="card border-neutral">
	<div class="card-header">
	    <h4 class="inline-block">Lista de empleados</h4>
		<a href="{{route('form-empleado')}}" class="btn-neutral btn-secondary float-right">Nuevo</a>
	</div>
	<div class="card-body">
    <div class="table-responsive">
      <table class="table" id="dataTableCiclos">
        <thead>
          <th>#</th>
          <th>Foto</th>
          <th>Nombre</th>
          <th>Genero</th>
          <th>Numero empleado</th>
          <th>Departamento</th>
          <th></th>
        </thead>
        @foreach ($empleados as $key => $emple)
        <tr>
          <td>{{ $key+1}}</td>
          @if($emple->foto != null)
          <td>
            <img  src="{{asset("CODE_DATA/storage".App\Services\Internal\DocumentStatements::$PATH_EMPLE_IMG)."/".$emple->foto}}" class="rounded img-fluid" alt="avatar" width="100px" height="100px">
          </td>
          @else
          <td>
            <small>No cuenta con fotografia</small>
          </td>
          @endif
          <td>{{ $emple->nombres. " " . $emple->paterno." ".$emple->materno}}</td>
          @if($emple->genero == 'M')
          <td>Masculino</td>
          @elseif($emple->genero == 'F')
          <td>Femenino</td>
          @endif
          <td>{{ $emple->num_empleado}}</td>
          <td>{{ $emple->departamento}}</td>
          <td>
            <a href="{{url('/admin/edit-empleado-form/'.$emple->id)}}" class="btn btn-info">Editar</a>
            <button type="button" value="{{$emple->id}}" onclick="modelDelete(this, `{{url('/admin/delete-empleado/')}}`)" class="btn btn-danger">Eliminar</button>
          </td>
        </tr>
        @endforeach
      </table>  
    </div>
	</div>
	<div class="card-footer">
    {{$empleados->links()}}
	</div>
</div>
@endsection

<script>
  function modelDelete(evt, url) {
    var id = evt.value
    console.log(id)
    var sendUrl = url +"/"+ id
    Swal.fire({
      title: '¿Estás seguro?',
      text: "Ya no podras revertir esta acción!!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Si, de acuerdo!'
    }).then((result) => {
      if (result.value) {
        var req = new XMLHttpRequest();
        req.open('GET', sendUrl , true);
        req.onreadystatechange = function (aEvt) {
          if(req.status == 200){
              Swal.fire(
                'Eliminado!',
                'El archivo ha sido eliminado',
                'success'
              ).then((result) => {
                if (result.value) {
                  location.reload()
                }else{
                   location.reload()
                }
              })
          }else{
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Ah ocurrido un error! Intente más tarde o llame al administrador'
              })
          }
        };
        req.send(null);
      }
    })
  }

</script>