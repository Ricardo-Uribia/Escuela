@extends('layouts.admin')

@section('principal')

<div id="page-wrapper">
<br>
 <div class="col-md-12">
    <div class="table-responsive-sm">

     <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/crear/alumno') }}">Upload Images</a>
                </li>
                
            </ul>
        </div>

    <br><br>


        <table class="table">
            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Filename</th>
              
                <th scope="col">algo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td><img src="/imag/{{ $photo->resized_name }}"></td>
                    <td>{{ $photo->name }}</td>
                   
                    <td><a href="{{ url('/delete')}}/{{$photo->id}}"><button>Borrar</button></a></td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    </div>
    </div>
@endsection