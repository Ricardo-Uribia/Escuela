@extends('layouts.admin')
@section('contenido')
@section('scripts')
  <script src="{{asset('/CODE_DATA/public/js/internal/swalDelete.js')}}"></script>
@endsection
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
    <h4 class="inline-block">Carreras</h4>
	<button type="button" class="btn-neutral btn-secondary float-right" data-toggle="modal" data-target="#modal_create_nivel">NUEVO NIVEL</button>
	@include('Backend/Configuracion/Niveles/Formularios/modal_create_nivel')
  </div>
  <div class="card-body">
	<a href="{{url('/admin/niveles/createForm')}}" class="btn-neutral btn-secondary float-right">NUEVA CARRERA</a>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<th>Id</th>
				<th>Ident</th>
				<th>Nivel</th>
				<th m>Descripci¨®n</th>
				<th>Fecha Plan</th>
				<th>Fecha Inicio</th>
				<th></th>
			</thead>
           
		</table>
	</div>
  </div>
  <div class="card-footer">
  	
  </div>
</div>
@endsection