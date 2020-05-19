<table style="width:100%" class="table table-hover table-striped" >

@foreach($data as $users)
  <tr  style="height:50px">
    <td style="padding:10px">{{$users->name}}</td>
    <td style="padding:10px">{{$users->email}}</td>

     @switch($users->role)
                @case(1)
                    <td style="padding:10px">Administrador</td>
                @break
                @case(2)
                    <td style="padding:10px">Profesor</td>
                @break
                @case(3)
                    <td style="padding:10px">Director</td>
                @break
                @case(4)
                    <td style="padding:10px">Alumno</td>
                @break
            @endswitch
  </tr>
@endforeach
</table>
