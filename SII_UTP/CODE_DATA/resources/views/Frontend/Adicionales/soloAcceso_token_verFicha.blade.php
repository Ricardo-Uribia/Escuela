@extends('layouts.app')

@section('contenido')
                         
          <div class="container-fluid">    
              <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="row">         
                      <div class="col-md-12" style="height: 70px">.</div>          
                      <div class="col-md-12">            
                        {{-- {{(string) Session::has('error')}} --}}
                        @if(\Session::has('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <p class="text-center">{{\Session::get('success')}}</p>              
                            </div>       
                            <br>                        
                        @elseif(\Session::has('error'))
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <p class="text-center">{{\Session::get('error')}}</p>              
                            </div>       
                            <br>
                        @endif                                                        
                      </div>
                      
                      <div class="alert alert-primary">
                        <h4>
                        	<ul>
	                        	<li class="text-body-description"><b class="text-blue">PASO 3: </b> Ingreso del comprobante de pago</li>
	                        
	                       	</ul>
	           
	                       	
                          Después de escanear o tomarle fotografía a tu comprobante de pago, ve a la sección "Actualizar documentos" y adjunta  tu comprobante.<br>
                          Al terminar, podrás descargar tu "Ficha de Registro", misma que deberás guardar y presentar el día del examen.<br>
                    
                        </h4>
                    </div>
                      
                      <div class="col-md-12">
                        <!--div class="alert alert-warning">
                          <h4>Para subir tus documentos, deberás escanearlos en formato .pdf</h4>
                        </div-->
                        <div class="alert alert-warning">
                            <h4>¡ATENCIÓN! Los cambios realizados se demoran aproximadamente 30 min en reflejarse. Por favor regrese una vez cumplido ese tiempo para corraborar cambios.</h4>
                        </div>
                        
                        <h4>Folio:  <span>{{$alumno->folio->folio}}</span></h4><br>  
                        
                        <h4>Alumno: <span>{{$alumno->getNombreCompleto()}}</span>
                        
                        </h4>
                        <h4>Email:  <span>{{$alumno->email}}</span></h4>
                        <form method="POST" action="{{route('downloadPDF') }}">
                            @csrf
                            <input type="text" name="tipoPDF" value="1" hidden="hidden">
                            <input type="text" name="alumno_id" value="{{$alumno->id}}" hidden="hidden">
                             
                         <br>
                                            
                                            <h4>Recupera tu ficha de pago</h4>
                                            <hr>
                            <input type="submit" class="btn btn-danger" value="Descargar ficha de pago">     
                             <br>
                        </form>
                        <br> 
                        <br>
                        <center>
                          <h4 style="display: inline-block;">Actualizar información</h4>           
                          <div class="text-danger" id="pre_municipio_id">Si se equivoco de municipio y desea cambiar, porfavor seleccione su estado de nuevo.</div>
                        </center>
                        <hr>
                        <br>

                        {{-- form --}}
                        <form action="{{route('form-update-alumno-pub')}}" class="was-validated" id="form_update_info_id" method="POST" enctype="multipart/form-data">        
                            {{-- @csrf                                       --}}
                            <input type="hidden" name="alumno_id" value="{{$alumno->id }}">
                            <input type="hidden" name="_token_al" value="{{$_token}}">

                            <div class="form-group row">
                              <div class="col-sm-3">
                                  @if($alumno->fotografia != null)
                                    <img src="{{asset("CODE_DATA/storage".App\Services\Internal\DocumentStatements::$PATH_ALUMN_IMG)."/".$alumno->fotografia}}" style="width: 200px; height: auto; border-radius: 10px">
                                    <small>Fotografía actual</small>
                                  @else
                                    <small>Usted no cuenta con fotografia actualmente.</small>
                                  @endif
                              </div>
                              <div class="col-sm-9">
                                <div style="margin-top: 7%">
                                  <label class="control-label" for="fotografia_">Cambiar Fotografía</label><br>
                                  <input type="file" name="fotografia" id="fotografia_" accept="image/*" />
                                </div>
                              </div>     
                              <div class="col-sm-12">.</div>                                                     

                              <div class="col-sm-4">
                                <label class="control-label" for="estado_ver_ficha">
                                  Estado donde se encuentra
                                </label>
                                <select class="form-control" id="estado_ver_ficha" name="estado_id" required onchange="javascript:document.getElementById('pre_municipio_id').setAttribute('hidden', 'hidden')">
                                  <option value="{{$alumno->estado->id}}" selected="selected">{{$alumno->estado->nom_ent}}</option>                                
                                </select>
                              </div>

                              <div class="col-sm-4">                                            
                                <label class="control-label" for="municipio_ver_ficha">
                                  Municipios:
                                </label>
                                <select class="form-control" id="municipio_ver_ficha" name="municipio" required>  
                                  <option value="{{$alumno->municipio}}" selected="selected">{{$alumno->municipio}}</option>
                                </select>      
                              </div> 

                              <div class="col-sm-4">                                            
                                <label class="control-label" for="cuidad_">
                                  Ciudad o localidad
                                </label>
                                <input class="form-control" id="ciudad_" name="ciudad" required  value="{{$alumno->ciudad}}" type="text">
                              </div>

                              <div class="col-sm-4">                         
                                <label class="control-label" for="direccion_">Dirección</label>
                                <input type="text" class="form-control" id="direccion_" name="domicilio" required value="{{$alumno->domicilio}}">
                              </div>

                              <div class="col-sm-4">                         
                                <label class="control-label" for="celular_">Celular</label>
                                <input type="number" class="form-control" name="celular" value="{{$alumno->celular}}" required id="celular_">
                              </div>                            

                              <div class="col-sm-4">                         
                                <label class="control-label" for="email_">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$alumno->email}}" required id="email_">
                              </div>  
                              <div class="col-sm-12">.</div>
                              <div class="col-sm-12"></div>                                        
                              <div class="col-sm-8"></div>                          
                              <input type="submit" value="Guardar" id="btn_submit_info_form_id" class="btn btn-primary btn-block col-sm-4">
                        </form>
                        {{-- end form --}}

                        <div class="col-sm-12" style="height: 70px"></div>
                        <div class="col-md-12 text-center">    
                                             
                        
                          <h4>Actualizar documentos</h4>
                          <div class="alert alert-info">
                          <h4>Si aún no has adjuntado tus documentos, puedes realizarlo ahora para que se genere tu Ficha de Registro</h4>
                        </div>
                          <hr>
                        </div>
                        <div class="col-sm-5">
                          <h4>
                            Documentos recibidos 
                            <button class="btn btn-success float-right" type="button" data-toggle="modal" data-target="#modal_nuevo_archivo_id" onclick="create('newFile','--')">Añadir nuevo</button>
                          </h4> 
                          <br>
                          <table cellpadding="7px">
                            @foreach($documentos as $key => $documento)
                              <tr>                         
                                  <td>{{$key+1}}</td>       
                                  <td>
                                    {{$documento->nombre}} 
                                  </td>                               
                                  <td>                                                  
                                    <button type="button" class="btn btn-primary" onclick="setFileOnIFrame(
                                            `{{asset('/CODE_DATA/storage/documentos_,/alumnos_')}}`,
                                            `{{$documento->archivo}}`)">
                                      Ver
                                    </button>      
                                    <button type="button" class="btn btn-warning" data-toggle="modal" 
                                    onclick="create('changeFile','{{($documento->id."--".$documento->nombre)}}')">
                                      Cambiar
                                    </button>
                                    <br>
                                    @if($documento->nombre == 'FICHA PAGO DE REGISTRO')
                                        <form method="POST" action="{{route('downloadPDF') }}">
                                            @csrf
                                            <input type="text" name="tipoPDF" value="2" hidden="hidden">
                                            <input type="text" name="alumno_id" value="{{$alumno->id}}" hidden="hidden">
                                            <input type="submit" class="btn btn-success" value="Descarga tu Ficha de Registro"> <br>  
                                            
                                            
                                            </form>
                                    @endif
                                  </td>
                              </tr>
                            
                            @endforeach
                        
                            
                          </table>
                          
                        </div>
                        <div class="col-sm-7" style="height: 350px">
                          <center><h4>Visualización de documento <small id="loading_message_id"></small> </h4></center>
                          <iframe frameborder="0" id="iframe_file_id" style="width: 100%; height: 100%;"></iframe>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div> 
                  <div class="col-sm-12">
                      <br>
                       <div class="alert alert-success">
                          <h4><b>Paso 4.</b> (Estará disponible del 01 al 12 de junio de 2020)<br>
	                       	
                          Durante estos días deberás ingresar nuevamente al sistema y darle click al botón <b>OBTENER FICHA DE INGRESO AL EXANI II, 2020.</b></h4><hr>
                          <div class="text-danger"><h4><b>IMPORTANTE: </b> NO OLVIDES INGRESAR DE NUEVO AL SISTEMA DURANTE ESTAS FECHAS PARA REALIZAR ESTE ÚLTIMO PASO, YA QUE DE NO HACERLO, NOS SERÁ IMPOSIBLE PERMITIRTE LA ENTRADA.</h4></div><br>
                          
                        </div>
                      
                    <a href="http://registro.utponiente.edu.mx/" class="btn btn-primary">SALIR</a>
                  </div>   
                 
              </div>
          </div>    
          <br>        
          <br>        
          <br>        
          <br>                
        <!-- Modal cambio/actualización de archivo existente -->
        <div class="modal fade" id="modal_cambiar_archivo_id" tabindex="-1" role="dialog" aria-labelledby="titulo_modal_cambiar_archivo_id" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="titulo_modal_cambiar_archivo_id">Cambiar documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('form-update-alumno-pub')}}" method="POST" enctype="multipart/form-data" id="form_change_document_id">
                  {{-- @csrf --}}
                  <input type="hidden" name="_token_al" value="{{$_token}}">
                  <p>Documento a cambiar: <span id="dsc_archivo_cambiar_id"></span></p>
                  <div id="form_body_inputs_id">
                     
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-primary" id="btn_send_post_change_docs_id" disabled="disabled" value="Guardar cambio en documento">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>



        <!-- Modal añadir nuevo archivo -->
        <div class="modal fade" id="modal_nuevo_archivo_id" tabindex="-1" role="dialog" aria-labelledby="titulo_modal_nuevo_archivo_id" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header bg-dark text-light">
                <h5 class="modal-title" id="titulo_modal_nuevo_archivo_id">Nuevo documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="create()">
                  <span aria-hidden="true">&times;</span>
                </button>                
              </div>
              <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="{{route('form-update-alumno-pub')}}" class="form-group was-validated">
                  <input type="hidden" name="alumno_id" value="{{$alumno->id}}">
                  <input type="hidden" name="alumno_folio" value="{{$alumno->folio->folio}}">
                  <input type="hidden" name="_token_al" value="{{$_token}}">

                  <p style="display: inline-block;">Tipo: </p>                   
                  <select class="form-control" required name="nombre_documento" onchange="insertInputName(this.value)">
                    <option value="">-- Seleccionar --</option>
                    @php
                      use App\Services\Internal\DocumentStatements as DSts;
                      $doctosRequeridos = DSts::getDoctosRequeridosParaRegAlumno();
                      $doctos_user      = array();                       
                      foreach ($documentos as $docto) {array_push($doctos_user, $docto->nombre);} 
                      $doctosFaltantes  = array_diff($doctosRequeridos, $doctos_user);  
                      foreach ($doctosFaltantes as $docto_) {echo "<option value=".$docto_.">".$docto_."</option>";}
                    @endphp                  
                  </select>                    
                  <br>
                  <input type="file" name="documento" accept="application/pdf" id="input_documento_nuevo_id" disabled="disabled" onchange="checkFile(this.value)">  
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <input class="btn btn-primary" id="btn_send_post_new_doc_id" disabled="disabled" type="submit" value="Guardar nuevo documento">                
                  </div>
                </form>

              </div>
            </div>
          </div>
        </div>                    
  
@endsection
@section('scripts')

  <script defer> 
    const NOT_BLOCK   = true;   
    const BLOCK       = false;
    const input_check = document.getElementById('confirm_doc'); 
    const btn_submit  = document.getElementById('btn_subir_doc');    
    const iFrame      = document.getElementById('iframe_file_id');
    const iFrame_loading_message = document.getElementById('loading_message_id');     
    const btn_submit_change_doc  = document.getElementById('btn_send_post_change_docs_id');
    var factoryForms = new _FactoryForms();    
    var form = null;    

    
    //VER
    function setFileOnIFrame(path, file){            

      iFrame_loading_message.innerHTML = "Cargando pdf..";
      if (file != null) {
        iFrame_loading_message.innerHTML = "";
        iFrame.setAttribute("src", path+"/"+file);
      }
      else{iFrame_loading_message.innerHTML = "Archivo no encontrado, vuelva a intentar porfavor";}
    }

    const input_file= document.getElementById('input_documento_nuevo_id');    
    function insertInputName(value){            
      if (value != '') {
        input_file.removeAttribute('disabled');
      }else{
       input_file.setAttribute('disabled', 'disabled');
      }
    }


    //main
    function create(type, extras) {        
      args = extras.split("--", 2); //  divivir cuando aparezca -- y limite 2       
      form = factoryForms.create(type, args);
      form.appendInputs();                   
    }

    function checkFile(file){
      form.file= file;      
      form.validateInputs();
    }

    // function sendPost(url, form_id){
    //   form.urlPost  = url ;
    //   form.formHtml = form_id;
    //   form.sendPost();
    // }
    


   












    //FACTORIES

    //Factory method
    function _FactoryForms(){
      this.create = function (type, args) {
          var form;
   
          if (type === "newFile") {
              form = new NewFile(args);              
          } else if (type === "changeFile") {
              form = new UpdateFile(args);              
          }
   
          form.type = type;          
             
          form.appendInputs = function (){            
            rootFunctions.append(this.inputs, this.formBody);
          }
          form.validateInputs= function(){            
            rootFunctions.validate(this.file, this.submitButton);
          }
          // form.sendPost = function(){
          //   rootFunctions.post(this.urlPost, this.formHtml);
          // }
          return form;
      }
    }    

    //Forms
    //nuevo documento
    var NewFile = function (args) {          
      this.submitButton = document.getElementById('btn_send_post_new_doc_id');
      this.formBody     = null;
      this.inputs       = '';
    };

    //actuaizar / cambio de documento
    var UpdateFile = function (args) {
      var file = new Object();
      file.id           = args[0];
      file.nombre       = args[1];
      this.modal        = $("#modal_cambiar_archivo_id").modal().show();          
      this.title        = document.getElementById('dsc_archivo_cambiar_id').innerHTML  = file.nombre;      
      this.submitButton = btn_submit_change_doc;
      this.formBody     = document.getElementById('form_body_inputs_id');     
      this.inputs       ='';
      this.inputs       += '<input type="file" name="documento" required accept="application/pdf" onchange="checkFile(this.value)"><br>';
      this.inputs       += '<input type="hidden" name="documento_id" value="'+file.id+'" required><br>';
    };

    //helpers
    // construct helper
    var rootFunctions = (function () {        
        return {
            append: function (inputs, form_body) {
              if (inputs == null || form_body == null) {
              }
              else{form_body.innerHTML = inputs;}
            },
            validate: function(file,submitButton){
              if (file != null && file.substr(-4,4) == '.pdf'){
                submitButton.removeAttribute('disabled');
              }else{
                submitButton.setAttribute('disabled', 'disabled');
                alert('Por favor seleccione un archivo válido con .pdf');
              }
            }
            // ,
            // post: function(url, formHtml){
            //     _XMLHttpRequest("post",url+"*-*"+formHtml);
            // }
        }
    })();
        
  </script>
@endsection

