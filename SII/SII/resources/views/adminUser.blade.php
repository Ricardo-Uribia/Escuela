@extends('layouts.admin')
@section('principal')

@push('usuario')
<script>
$(document).ready(function(){

  $("#msg").hide();
  //alert("working");

  $("#btn").click(function(){
    $("#msg").show();
    var user_id = $("#user_id").val()
    var email = $("#email").val();
    var role = $("#role").val();
    var password = $("#password").val();
    var token = $("#token").val();

    $.ajax({
      type: "post",
      data: "user_id=" + user_id + "&email=" + email + "&role=" + role + "&_token=" + token + "&password=" + password,
      url: "<?php echo url('/add/userSystem') ?>",
      success:function(data){

        $("#msg").html("Usuario Agregado con Éxito");
        $("#msg").fadeOut(2000);
      },
      error: function(data) {
        $("#msg").hide();
        alert("Email Duplicado..!!");
      }
    });
  });

     
  var auto_refresh = setInterval(
    function(){
      $('#products').load('<?php echo url('admin/userSystem');?>').fadeIn("slow");
    },10000);
});
</script>
@endpush
<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card">

                            <div class="content">
                            <h2>Agregar Usuarios al Sistema</h2>
                            <p id="msg" class="alert alert-success"></p>

                          <input type="hidden" value="{{csrf_token()}}" id="token"/>


                              <label>Selecciona Tipo de Usuario</label>
                              <select name="role" class="form-control" id="role">
                                    <option value="">Selecciona</option>
                                    <option value="1">Administrador</option>
                                    <option value="2">Profesor</option>
                                    <option value="3">Director</option>
                                    <option value="4">Alumno</option>
                                    <option value="5">Cajero</option>
                              </select>

                              <br>

                          <label>Nuevo Usuario</label>

                            {!!Form::select('user_id', ['placeholder' => 'Selecciona'], null, ['id' => 'user_id', 'class' => 'form-control', 'name' => 'user_id', 'readonly' => 'readonly'])!!}

                          <br>
                              <label>Email</label>
                             
                              {!!Form::select('email', ['placeholder' => 'Selecciona'], null, ['id' => 'email', 'class' => 'form-control', 'name' => 'email', 'readonly' => 'readonly'])!!}
                              <br>

                              <label>Contraseña</label>
                              <input type="password" id="password" name="password" class="form-control"/>
                              
                              <br>
                                <input type="submit" class="btn btn-success btn-fill" value="Submit" id="btn"/>


                              <div class="footer">

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <div class="card">
                          <table width="100%" class="table table-hover table-striped" >
                            <tr >
                          <td colspan="5" align="right"><b>Total:</b> </td>
                            </tr>
                            <tr style="border-bottom:1px solid #ccc;">
                              <th style="padding:10px"> Nombre</th>
                              <th style="padding:10px"> Email</th>
                              <th style="padding:10px">Role</th>
                            </tr>
                          </table>
                            <div class="content"
                             style="height:400px; overflow-y:scroll; overflow-x:hidden">

                                <div id="products">
                                  <img src="{{url('img/loading.gif')}}"
                                  style="width:90%;text-align:center">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>



@endsection
