@extends('layouts.admin')
@section('contenido')
@if(Session::has('success'))
  <div class="small-box bg-success">
    <div class="card-header">
      <center><p>{{Session::get('success')}}</p></center>
    </div>
  </div>
@endif
@if(Session::has('error'))
  <div class="small-box bg-danger">
    <div class="card-header">
      <center><p>{{Session::get('error')}}</p></center>
    </div>
  </div>
@endif
<div class="card border-neutral">
  <div class="card-header">
    <h4 class="inline-block">Administrar Usuarios</h4>
    <a href="{{url('/admin/index')}}" class="btn-neutral btn-secondary float-right">REGRESAR</a>
  </div>
  <div class="card-body">
     <p id="msg" class="alert alert-success"></p>
    <div class="timeline timeline-inverse">
      <div>
        <div class="timeline-item">
            <h3 class="timeline-header border-0">Usuarios con acceso al sistema: @if(empty($users)) 0 @else {{$users}} @endif</h3>
        </div>
      </div>
    </div>
    <form class="form-horizontal" action="{{url('/admin/addUserSystem')}}" method="post" id="registrationForm">
      @csrf
      <div class="form-group row">
          <label for="tipoUser" class="col-sm-2 col-form-label">Tipo de usuario</label>
          <div class="col-sm-10 was-validated">
              <select required id="tipoUser" class="form-control selectpicker" data-live-search="true" name="tipoUser" onchange="consultingData(this.value)">
                  <option value="">--Selecciona--</option>         
                  <option value="1">Administrador</option>         
                  <option value="2">Profesor</option>         
                <!--   <option value="3">Alumno</option>         --> 
                  <option value="4">Admistrador y Profesor</option>   
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="user_id" class="col-sm-2 col-form-label">Nuevo usuario</label>
          <div class="col-sm-10 was-validated">
              <select required id="user_id" class="form-control " onchange="getInfoUser(this.value)"  name="user_id">
                <option value="">--Selecciona--</option>              
              </select>
          </div>
      </div>
      <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label">Email usuario</label>
          <div class="col-sm-10 was-validated">
              <input required type="email" readonly name="email" class="form-control @error('email') is-invalid @enderror" id="email"  placeholder="Email..."/>
              @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong style="color: red;">{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>
      <div class="form-group row">
        <label for="contrasena" class="col-sm-2 col-form-label">Contraseá</label>
        <div class="col-sm-10 was-validated">
            <input required type="password" autocomplete="new-password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password"> 
            @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong style="color: red;">{{ $message }}</strong>
                </span>
            @enderror 
        </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-sm-2 col-form-label">Confirmar contraseña</label>
      <div class="col-sm-10 was-validated">
        <input placeholder="Confirmar contraseña" id="password-confirm" required type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong style="color: red;">{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
  </div>
  <div class="card-footer">
    <button class="btn btn-primary" type="submit">Guardar</button>
    <button class="btn btn-danger" type="reset">Cancelar</button>
  </div>
  </form>
</div>
@endsection
      
   
@section('scripts')
<script>
  $("#msg").hide();

  const input_sel_nombre_ude_consulta= document.getElementById('user_id');
  const mensaje = document.getElementById('msg');
  const email = document.getElementById('email')

  function consultingData(tipo) {
    let es_valido= parseInt(tipo) != 0;
    if (es_valido) {
      const GET_ = new XMLHttpRequest();
      const sendUrl = "{{url('/admin/get-usuarios')}}"+"/"+parseInt(tipo);
      GET_.open('GET', sendUrl, true);
      GET_.onload = function() {
        if (this.status >= 200 && this.status < 400) {
          var data = JSON.parse(this.response);
          if (data.datos.length != 0) {
            var html = "<option value='0'>--Selecciona--</option>";
            for(var i = 0; i < data.datos.length; i++) {
              html += "<option value='"+data.datos[i].id+"'>"+data.datos[i].nombres +" " +data.datos[i].paterno +" " +data.datos[i].materno+"</option> ";
            }
            input_sel_nombre_ude_consulta.innerHTML = html;
          }else{
            input_sel_nombre_ude_consulta.innerHTML = "<option value='0'>--Selecciona--</option>";
            mensaje.setAttribute("class", "alert alert-danger");
            mensaje.innerHTML  = "No hay información para mostrar";
            email.value="Email..."
            $("#msg").show();
            $("#msg").fadeOut(4000);
          }
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Ah ocurrido un error! Intente más tarde o llame al administrador'
          })
        }
      };
      GET_.send();
    }
  }

  function getInfoUser(id) {
    if (parseInt(id) != 0) {
        const sendUrl = "{{url('/admin/getInfoUser')}}" + "/" +id 
        const GET_ = new XMLHttpRequest()
        GET_.open('GET', sendUrl, true)
        GET_.onload = function(){
          if (this.status >= 200 && this.status < 400) {
            const response = JSON.parse(this.response)
            email.value = response.datos[0].email
          }else{
            console.log("Algo salio mal")
          }
        }
        GET_.send(null);
    }else{
        email.value = "Email..."
    }
  }
</script>

@endsection


