<!--Formulario Primer Parcial-->
  <form method="POST" action="{{ url('/guardar/calificaciones') }}" > 
    @csrf
  <div style="background-color: #cce5ff; height: 40px;">
    Ultimo registro 1 de Julio de 2019
  </div>

  <table  class="table table-bordered">
  <legend>Primer Parcial</legend>
  <thead>
    <tr>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Valor del Parcial</td> 
      <td><input type="text" name="valor" readonly></td>  
    </tr>
    <tr>
      <td>Total de sesiones</td>
      <td><input type="text" name="" value=""></td>
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
      <th>Calificacion</th>
      <th>Base 10</th>
      <th>Asistencias</th>
      <th>% Asistencias</th>
    </tr>
  </thead>
  <tbody>
     @if(!empty($academico))
     @foreach($academico as $ocademico)
    <tr>
      <td>{{$loop->iteration}}</td>
      <!--Datos ocultos para obtenerlos y guardarlos, pero que no son necesarios en la vista-->
      <td style="display: none;"><input type="number" name="ciclo" value="{!!$ocademico->idCiclo!!}"></td>
      <td style="display: none;"><input type="number" name="alumno[]" value="{!!$ocademico->id_alumno!!}"></td>
      <td style="display: none;"><input type="number" name="profesor_grupo" value="{!!$ocademico->idProfesorGrupo!!}"></td>
      <td style="display: none;"><input type="number" name="nivel" value="{!!$ocademico->idNivel!!}"></td>
      <td style="display: none;"><input type="number" name="momento" value="1"></td>
      <!--Datos que se mostraran en la vista-->
      <td><?php echo $ocademico->Paterno." ".$ocademico->Materno." ".$ocademico->Nombres; ?></td>
      <td>{{$ocademico->Matricula}}</td>
      <td><input type="float" name="calificacion[]" value="" required=""></td>
      <td><input type="number" name="base10"></td>
      <td><input type="number" name="asistencia[]" value="" required=""></td>
      <td><input type="number" name="asistencia_porcentaje"></td>  
    </tr>
     @endforeach
     @endif
     
  </tbody>
</table>
<div >
<input type="submit" class="btn btn-success btn-md pull-right" value="Guardar">
</div>
</form>