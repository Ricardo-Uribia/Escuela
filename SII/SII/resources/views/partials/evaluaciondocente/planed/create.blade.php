@extends('layouts.admin')
@section('principal')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="card">
                    
                    <div class="panel panel-default">
                   <div class="panel-heading ">
                       <center><h4>Crear nuevo Plan de Evalucion Docenten</h4></center> 
                    </div>
               </div>
                    
                    <div class="card-body">
                        <a href="{{ url('/planed') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> </button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/planed') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('partials.evaluaciondocente.planed.form')

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
