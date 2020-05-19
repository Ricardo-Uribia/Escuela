<!-- Formulario Parcial 2-->
<form > 
  <div class="alert alert-primary" role="alert">
    Último registro 1 de Julio de 2019
  </div>

  <table  class="table table-bordered">
  <legend>Segundo Parcial</legend>
  <thead>
    <tr>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Valor del Parcial</td>
      @foreach($academico as $oacademico)
      @endforeach
      <td><input type="text" name="" value="{!!$oacademico->p2!!}" disabled></td>  
    </tr>
    <tr>
      <td>Total de sesiones</td>
      <td><input id="totalsesiones" type="" name="" value=""></td>
    </tr>
     <tr>
      <td>Fecha limite de Entrega</td>
      <td>El periodo ya paso y fue 05 de Junio de 2019 al 07 de Julio de 2019</td>
    </tr>
  </tbody>
</table>

 <table  class="table table-bordered">
  <thead>
    <tr>
      <th>#</th>
      <th>Alumno</th>
      <th>Matricula</th>
      <th>Ponderacion</th>
      <th>Calificación</th>
      <th>Base 10</th>
      <th>Asistencias</th>
      <th>% Asistencias</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td><input type="" name=""></td>
      <td></td>
      <td><input id="sesiones" type="" name=""></td>
      <td><input id="porcentaje" type="" name=""></td>  
    </tr>
  </tbody>
</table>
</form>