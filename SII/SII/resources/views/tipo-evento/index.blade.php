@extends('layouts.admin')

@section('principal')
    <div class="container">
        <div class="row">
            

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <a href="{{ url('/tipo-evento/create') }}" class="btn btn-success btn-sm" title="Add New TipoEvento">
                            <i class="fa fa-plus" aria-hidden="true"></i> Nuevo Evento
                        </a>
                        <a href="{{ url('/eventoacti') }}" class="btn btn-warning btn-sm" title="Add New TipoEvento">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> Catalogo de Eventos
                        </a>

                        <form method="GET" action="{{ url('/tipo-evento') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                <center><h2>TIPO DE EVENTOS</h2></center>
                                <thead>
                                    <tr>
                                        <!--th>#</th--><th>IdEvento</th><th>TipoEvento</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody style="border-bottom: 1px solid #000;">
                                @foreach($tipoevento as $item)
                                    <tr>
                                        <!--td>{{ $loop->iteration or $item->idEvento }}</td-->
                                        <td>{{ $item->idEvento }}</td><td>{{ $item->TipoEvento }}</td>
                                        <td>
                                            <a href="{{ url('/tipo-evento/' . $item->idEvento) }}" title="View TipoEvento"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> </button></a>
                                            <a href="{{ url('/tipo-evento/' . $item->idEvento . '/edit') }}" title="Edit TipoEvento"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> </button></a>

                                            <form method="POST" action="{{ url('/tipo-evento' . '/' . $item->idEvento) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete TipoEvento" onclick="return confirm(&quot;Esta seguro de Eliminar el tipo de Evento?, Es posible que en el momento de crear un nuevo Catalogo de Evento, ya no se vea&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $tipoevento->appends(['search' => Request::get('search')])->render() !!} </div>
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
