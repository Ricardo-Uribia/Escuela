@extends ('layouts.admin')
@section ('principal')

<div class="row">
  <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <h3>Listado de Ventas </h3>
    <a href="../../../../utp/venta/plan/create"><button class="btn btn-danger"><i class="fa fa-chevron-left"></i> Regresar</button></a>
<br><br>    
    @include('admin.cobranza.ventaPlanes.search')


<br>
  </div>
</div>


<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="table-responsive">
      <table class="table table-striped table-bordered table-condensed table-hover">
        <thead>
          <th>Fechas de Pago</th>
          <th>Alumno</th>
          <th>Ciclo</th>
          <th>Cantidad Programada</th>
          <th>Pagado</th>
          <th>Cantidad Pagada</th>
          <th>Código Plan</th>
          <th>Total a Pagar</th>
          <th>Fecha de Pago</th>
        </thead>
      @foreach ($ventas as $ven)
        @if($ven->pagado == 'S' || $ven->pagado == 'C' || $ven->pagado == 'N')
        <tr>
          <td>{{ $ven->fechasPago}}</td>
          <td>{{ $ven->nombre}}</td>
          <td>{{ $ven->descripcion}}</td>
          <td>{{ $ven->cantidadProgramada}}</td>
          <td >{{ $ven->pagado}}</td>
          <td>{{ $ven->cantidadPagada}}</td>
          <td>{{$ven->codigoPlan}}</td>
          <td>{{$ven->totalPagar}}</td>
          <td>

          @if ($ven->pagado == 'S')
            <a id="detalles"  href="{{url('/')}}/utp/detalles/venta-planes-{{$ven->idAlumnosCxC}}"><button class="btn btn-primary" ><i class="fa fa-info-circle"></i> Detalles</button></a>
          @endif
            <a href="" data-target="#modal-delete-{{$ven->idAlumnosCxC}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i> Anular</button></a>
          </td>
        @endif
        </tr>
        @include('admin.cobranza.ventaPlanes.modal')
        @endforeach
      </table>

      
    </div>
    {{$ventas->render()}}
  </div>
</div>



@endsection