@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
           

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <a href="{{ url('/grupos_villas/create') }}" class="btn btn-success btn-sm" title="Add New grupos_villa">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar Villa
                        </a>
                        
                        
                        <a href="{{ url('/catalogo_villas') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Catalogos</button></a>
                        <br>
                        <br>

                        <form method="GET" action="{{ url('/grupos_villas') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                            <table class="table table-striped" id="contador">
                                <thead>
                                    <tr>
                                        <!--th>#</th--><th>Identificador</th><th>Nombre Villa</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;">
                                @foreach($grupos_villas as $item)
                                    <tr>
                                        <!--td>{{ $loop->iteration or $item->idgrupos_villas }}</td-->
                                        <td>{{ $item->idgrupos_villas }}</td><td>{{ $item->nombreVilla }}</td>
                                        <td>
                                            <a href="{{ url('/grupos_villas/' . $item->idgrupos_villas) }}" title="View grupos_villa"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/grupos_villas/' . $item->idgrupos_villas . '/edit') }}" title="Edit grupos_villa"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/grupos_villas' . '/' . $item->idgrupos_villas) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete grupos_villa" onclick="return confirm(&quot;Esta seguro de Eliminar el grupo de Villa?, es posible que ya no se pueda visualizar en el catalogo, generando un error inesperado&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $grupos_villas->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    <script>

    var $num=document.getElementById('contador').getElementsByTagName('tr').length - 1;
    document.write("contador total de:    "+$num+" registros");
    </script>
    </div>
@endsection
