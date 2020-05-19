<table style="width:100%" class="table table-hover table-striped" >

@foreach($data as $alumn_grupo)
  <tr  style="height:50px">
    <td style="padding:10px">{{$alumn_grupo->Matricula}}</td>
    <td style="padding:10px">{{$alumn_grupo->Nombres. " " .$alumn_grupo->Paterno. " " .$alumn_grupo->Materno}}</td>
    <td style="padding:10px">{{$alumn_grupo->Genero}}</td>
    <td style="padding:10px">{{$alumn_grupo->Status}}</td>
    <td></td>

  </tr>
@endforeach
</table>
