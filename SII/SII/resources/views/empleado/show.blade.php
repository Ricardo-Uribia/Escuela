@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Empleado {{ $empleado->idEmpleado }}</div>
                    <h2>Datos del Empleado</h2>
                    <div class="card-body">

                        <a href="{{ url('/empleado') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        

                        <!--<form method="POST" action="{{ url('empleado' . '/' . $empleado->idEmpleado) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Empleado" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>-->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $empleado->id }}</td>
                                    </tr>
                                    <tr><th> Foto </th><td> {{ $empleado->foto }} </td></tr>
                                    <tr><th> Nombre </th><td> {{ $empleado->NombreEmpleado }} </td></tr>
                                    <tr><th> Primer Apellido </th><td> {{ $empleado->txtPaterno }} </td></tr>
                                    <tr><th> Segundo Apellido</th> </th><td> {{ $empleado->txtMaterno }} </td></tr>
                                    <tr><th> Cargo </th><td> {{ $empleado->cargo }} </td></tr>
                                    <tr><th> Contrato </th><td> {{ $empleado->contrato }} </td></tr>
                                    <tr><th>idUser</th><td> {{ $empleado->user_id }} </td></tr>
                                    <tr><th>genero</th><td> {{ $empleado->genero }} </td></tr>
                                    <tr><th>Fecha Nacimiento</th><td> {{ $empleado->fechaNacimiento }} </td></tr>
                                    <tr><th>idEstado</th><td> {{ $empleado->estado_id }} </td></tr>
                                    <tr><th>Municipio Nac</th><td> {{ $empleado->municipioNacimiento }} </td></tr>
                                    <tr><th>Domicilio</th><td> {{ $empleado->domicilio }} </td></tr>
                                    <tr><th>Estado Actual</th><td> {{ $empleado->Estado_Actual_ID }} </td></tr>
                                    <tr><th>Municipio Actual</th><td> {{ $empleado->municipioActual }} </td></tr>
                                    <tr><th>Estado Civil</th><td> {{ $empleado->estadoCivil }} </td></tr>
                                    <tr><th>Numero de Seguro Social</th><td> {{ $empleado->numeroSeguroSocial }} </td></tr>
                                    <tr><th>Cedula Fiscal</th><td> {{ $empleado->cedulaFiscal }} </td></tr>
                                    <tr><th>Clave Ciudadana</th><td> {{ $empleado->claveCiudadana }} </td></tr>
                                    <tr><th>Codigo Postal</th><td> {{ $empleado->cp }} </td></tr>
                                    <tr><th>Telefono</th><td> {{ $empleado->telefono }} </td></tr>
                                    <tr><th>Celular</th><td> {{ $empleado->celular }} </td></tr>
                                    <tr><th>Email</th><td> {{ $empleado->email }} </td></tr>
                                    <tr><th>Fecha Ingreso</th><td> {{ $empleado->fecha_Ingreso }} </td></tr>
                                    <tr><th>Fecha Baja</th><td> {{ $empleado->fecha_Baja }} </td></tr>
                                    <tr><th>Departamento</th><td> {{ $empleado->departamento }} </td></tr>
                                    <tr><th>Sueldo</th><td> {{ $empleado->sueldo }} </td></tr>
                                    <tr><th>Nivel Estudio</th><td> {{ $empleado->nivelEstudio }} </td></tr>
                                    <tr><th>Carrera</th><td> {{ $empleado->carrera }} </td></tr>
                                    <tr><th>Titulado</th><td> {{ $empleado->titulado }} </td></tr>
                                    <tr><th>Institucion Estudio</th><td> {{ $empleado->institucionEstudio }} </td></tr>
                                    <tr><th>Cedula Profecional</th><td> {{ $empleado->cedulaProfecional }} </td></tr>
                                    <tr><th>Notas Descripcion</th><td> {{ $empleado->notasDescripcion }} </td></tr>
                                    <tr><th>Tipo</th><td> {{ $empleado->tipo }} </td></tr>
                                    <tr><th>Estatus Actual</th><td> {{ $empleado->StatusActual }} </td></tr>
                                    <tr><th>Facebook</th><td> {{ $empleado->facebook }} </td></tr>
                                    <tr><th>Departamento Anterior</th><td> {{ $empleado->departamentoAnterior }} </td></tr>
                                    <tr><th>Cargo Anterior</th><td> {{ $empleado->cargoAnterior }} </td></tr>
                                    <tr><th>Empresa Anterior</th><td> {{ $empleado->empresaAnterior }} </td></tr>
                                    <tr><th>Maestria</th><td> {{ $empleado->maestria }} </td></tr>
                                    <tr><th>Nombre Maestria</th><td> {{ $empleado->nombreMaestria }} </td></tr>
                                    <tr><th>Institucion Maestria</th><td> {{ $empleado->institucionMaestria }} </td></tr>
                                    <tr><th>Titulo Maestria</th><td> {{ $empleado->tituloMaestria }} </td></tr>
                                    <tr><th>Cedula Maestria</th><td> {{ $empleado->cedulaMaestria }} </td></tr>
                                    <tr><th>Doctorado</th><td> {{ $empleado->doctorado }} </td></tr>
                                    <tr><th>Nombre Doctorado</th><td> {{ $empleado->nombreDoctorado }} </td></tr>
                                    <tr><th>Instotucion Doctorado</th><td> {{ $empleado->institucionDoctorado }} </td></tr>
                                    <tr><th>Titulo Doctorado</th><td> {{ $empleado->tituloDoctorado }} </td></tr>
                                    <tr><th>Cedula Docotorado</th><td> {{ $empleado->cedulaDoctorado }} </td></tr>
                                    <tr><th>Post Doctorado</th><td> {{ $empleado->postDoctorado }} </td></tr>
                                    <tr><th>Nombre PosDoctorado</th><td> {{ $empleado->nombrePostDoctorado }} </td></tr>
                                    <tr><th>Institucion PostDoctorado</th><td> {{ $empleado->institucionPostDoctorado }} </td></tr>
                                    <tr><th>tituloPostDoctorado</th><td> {{ $empleado->tituloPostDoctorado }} </td></tr>
                                    <tr><th>CEdula PostDoctorado</th><td> {{ $empleado->cedulaPostDoctorado }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
