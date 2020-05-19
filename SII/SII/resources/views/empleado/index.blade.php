@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Empleado</div>
                    <div class="card-body">
                        <a href="{{ url('/crear/Empleado') }}" class="btn btn-success btn-sm" title="Add New Empleado">
                            <i class="fa fa-plus" aria-hidden="true"></i>Empleado
                        </a>

                        <a href="{{ url('/profesor/create') }}" class="btn btn-success btn-sm" title="Add New Empleado">
                            <i class="fa fa-plus" aria-hidden="true"></i>Profesor
                        </a>

                        <form method="GET" action="{{ url('/empleado') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>IdEmpleado</th><th>Foto</th><th>NombreEmpleado</th><th>PrimerApellido</th><th>SegundoApellido</th><th>FechaNac.</th><th>Estado_id</th><th>Mun.Nac.</th><th>Genero</th><th>ClaveCiudadana</th><th>EstadoCivil</th><th>Domicilio</th><th>Estado_Act.ID</th><th>Ciudad</th><th>CodigoPostal</th><th>Tel.</th><th>Cel.</th><th>Email</th><th>Face</th><th>NumSeguroSocial</th><th>idEmpleado</th><th>ClaveProfesor</th><th>StatusAct.</th><th>FechaIng.</th><th>FechaBaja</th><th>Dep.</th><th>Cargo</th><th>Contacto</th><th>Rfc</th><th>HrsDoc.</th><th>HrsInv</th><th>HrsAdmin</th><th>DepAnt.</th><th>CargoAnt.</th><th>EmpresaAnt.</th><th>Inst.Aca.</th><th>NivelEst.</th><th>Carrera</th><th>Titulado</th><th>Cédula</th><th>Maestria</th><th>Nom.Maest.</th><th>Ins.Maest.</th><th>Tit.Maest.</th><th>Ced.Maest.</th><th>Doctorado</th><th>Nom.Doc.</th><th>Inst.Doc.</th><th>Tit.Doc.</th><th>PostDoctorado</th><th>Nom.PostDoc.</th><th>Inst.PostDoc.Doc</th>Tit.PostDoc.<th>Tit.PostDoc.</th><th>Ced.PostDoc.</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($empleado as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->idEmpleado }}</td><td>{{ $item->foto }}</td><td>{{ $item->nombreEmpleado }}</td><td>{{ $item->txtPaterno }}</td><td>{{ $item->txtMaterno }}</td><td>{{ $item->fechaNacimiento }}</td><td>{{ $item->estado_id }}</td><td>{{ $item->municipioNacimiento }}</td><td>{{ $item->genero }}</td><td>{{ $item->claveCiudadana }}</td><td>{{ $item->estadoCivil }}</td><td>{{ $item->domicilio }}</td><td>{{ $item->Estado_Actual_ID }}</td><td>{{ $item->municipioActual }}</td><td>{{ $item->ciudad }}</td><td>{{ $item->cp }}</td><td>{{ $item->telefono }}</td><td>{{ $item->celular }}</td><td>{{ $item->email }}</td><td>{{ $item->facebook }}</td><td>{{ $item->numeroSeguroSocial }}</td><td>{{ $item->notasDescripcion }}</td><td>{{ $item->sueldo }}</td><td>{{ $item->StatusActual }}</td><td>{{ $item->fecha_ingreso }}</td><td>{{ $item->fecha_Baja }}</td><td>{{ $item->departamento }}</td><td>{{ $item->cargo }}</td><td>{{ $item->contrato }}</td><td>{{ $item->cedulaFiscal }}</td><td>{{ $item->departamentoAnterior }}</td><td>{{ $item->cargoAnterior }}</td><td>{{ $item->EmpresaAnterior }}</td><td>{{ $item->institucionAcademica }}</td><td>{{ $item->carrera }}</td><td>{{ $item->titulado }}</td><td>{{ $item->cedula }}</td><td>{{ $item->maestria }}</td><td>{{ $item->nombreMaestria }}</td><td>{{ $item->institucionMaestria }}</td><td>{{ $item->tituladoMaestria }}</td><td>{{ $item->cedulaMaestria }}</td><td>{{ $item->doctorado }}</td><td>{{ $item->nombreDoctorado }}</td><td>{{ $item->institucionDoctorado }}</td><td>{{ $item->tituladoDoctorado }}</td><td>{{ $item->cedulaDoctorado }}</td><td>{{ $item->postDoctorado }}</td><td>{{ $item->nombrePostDoctorado }}</td><td>{{ $item->institucionPostDoctorado }}</td><td>{{ $item->tituladoPostDoctorado }}</td><td>{{ $item->cedulaPostDocotorado }}</td>
                                      
                                            <a href="{{ url('/empleado/' . $item->idEmpleado) }}" title="View Empleado"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/empleado/' . $item->idEmpleado . '/edit') }}" title="Edit Empleado"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/empleado' . '/' . $item->idEmpleado) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Empleado" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $empleado->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
