@extends('layouts.app')

@section('estilos')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
@endsection

@section('contenido')

<div class="container-fluid">    
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="col-md-12" style="height: 100px"></div>   
            @if(isset($success))    
                <div class="alert alert-success">
                    <h4> 
                        {!! $success !!}
                    </h4>
                </div>
            @else
                <div class="alert alert-success">
                    <h4> 
                        Se ha guardado su informacion correctamente. Para subir sus documentos, deberá escanearlos en formato <b class="text-danger">.pdf</b>
                    </h4>
                </div>
            @endif
            <br>
            <br>
            <h4>Folio:  <span>{{$alumno->folio->folio}}</span></h4>
            <br>
            <h4>Alumno:
                <span>{{$alumno->getNombreCompleto()}}</span>
            </h4>
            <br>
            <h4>Email:  <span>{{$alumno->email}}</span></h4>
            <br>            

            @if(isset($success))
                <br>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <img src="{{asset('/CODE_DATA/public/img/internal_statics/arrow-red-down.png')}}" class="img-fluid" style="height: 120px; width: auto;">
                    </div>
                    <div class="col-md-2"></div>
                </div>                

                <form method="POST" action="{{route('downloadPDF') }}">
                    @csrf
                    <input type="text" name="tipoPDF" value="1" hidden="hidden">
                    <input type="text" name="alumno_id" value="{{$alumno->id}}" hidden="hidden">
                    <input type="submit" class="btn btn-primary" value="Descargar ficha de pago">                    
                </form>
                <br>
                <div class="alert alert-primary">
                        <h4>
                        	<ul>
	                        	<center>A partir de aquí, puedes continuar con el</center> <br>
	                        	<li class="text-body-description"><b class="text-blue">PASO 2: </b> Pago del derecho al EXANI II, 2020</li>
	                        	
	                        </ul>	
	                       	
                          Acude a la sucursal de Banco Azteca más cercana a tu domicilio para que, con los datos impresos en la ficha realices tu pago.
                          Luego, escanea la ficha y continúa con el paso 3.     <br>
                          <br>
                          
                    
                        </h4>
                        
                    </div>
                    
                    <div class="alert alert-danger">
                        <h4>
                               <div class="text-danger"> *PRECAUCIÓN* </div>
                        
                      ANTES DE SALIR REALIZAR TU PAGO EN VANTANILLA DE LA SUCURSAL BANCARIA, <B>TE EXHORTAMOS A SEGUIR TODAS LAS INDICACIONES SANITARIAS QUE HAN EMITIDO LAS AUTORIDADES DE SALUD ESTATAL Y FEDERAL.</B>
                        </h4>
                        
                       <center> <a href="https://www.youtube.com/watch?v=Z1nXAoLHCDw" target="_blank"> <h4> <b>
                                  ¡CONSÚLTALAS AQUÍ!</b></h4>
                                </a> </center>
                        
                        </div>
                
                <br>
                <br>
               <center> <a href="{{url('/pub/alumnos/createForm')}}" ><h4>Terminar proceso y salir</h4></a></center>
            @else
                <form method="POST" id="form_subir_documentos" action="{{route('form-pub-subir-documentos')}}" enctype="multipart/form-data" class="was-validated">                
                    @csrf
                    <input type="hidden" name="alumno_id" value="{{$alumno->id }}">            

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Acta de nacimiento</label>
                        <div class="col-sm-8">                         
                            <input type="file" id="acta_nac_id" accept="application/pdf" name="archivo_act_nacimiento" required>
                        </div>
                        <div class="col-sm-2"></div>
                    </div>                
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Curp</label>
                        <div class="col-sm-8">                         
                            <input type="file" id="curp_id" name="archivo_curp" accept="application/pdf" required>

                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Seleccione</label>
                        <div class="col-sm-8">                         
                            <input type="radio" id="terminando_bachiller_id" name="bachiller_" onclick="clickBachiller(this.value)" value="constancia">
                            <label for="terminando_bachiller_id">
                                Estoy terminando este año el bahillerato (Constancia)
                            </label>
                            <br>
                            <input type="radio" id="finalizado_bachiller_id" name="bachiller_" onclick="clickBachiller(this.value)" value="certificado">
                            <label for="finalizado_bachiller_id">
                                Terminé el bachillerato en años anteriores (Certificado)
                            </label>
                            <br>
                        </div>
                        <div class="col-sm-2"></div>                        
                        <div class="col-sm-2">
                            <label hidden="hidden" id="label_constancia_id"><b class="text-danger">Constancia</b> de bachillerato</label>
                            <label hidden="hidden" id="label_certificado_id"><b class="text-danger">Certificado</b> de bachiller</label> 
                        </div>
                        <div class="col-sm-8">
                            <br>
                            <input type="file" hidden="hidden" accept="application/pdf" id="const_bachillerato_id" name="archivo_bach" required>
                            <input type="file" hidden="hidden" accept="application/pdf" id="cert_bachillerato_id" name="archivo_bach" required>

                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                    <div class="form-group row" style="margin-bottom: 0px">
                        <div class="col-sm-6"></div>                        
                        <div class="col-sm-6">                        
                            <div class="row">                                
                                <img src="{{asset('/CODE_DATA/public/img/internal_statics/arrow-red-down.png')}}" class="img-fluid col-md-4" style="height: 130px">
                                <h5 class="col-md-8">Click aqui despues de cargar documentos.</h5>
                            </div>
                        </div>
                    </div>
                   {{--  <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Pago de registro <span class="text-danger">*opconal</span></label>
                        <div class="col-sm-8">                         
                            <input type="file" accept="application/pdf" id="pago_reg_id" name="archivo_pago_registro">                        
                        </div>
                        <div class="col-sm-2"></div>
                    </div>      --}}           
                    <div class="row">                    
                        <div class="col-sm-12
                        ">
                            <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox"  id="confirm_doc" onclick="validateDocumentsArePdf(this.checked)" required>
                                  <label class="form-check-label" for="confirm_doc">
                                    Manifiesto que los documentos proporcionados son escaneo fiel de los originales, los cuales entregaré a la brevedad al Depto. de Control Escolar.
                                  </label>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-sm-8"></div>
                    </div>
                </form>
                <br>
                
                <input disabled="disabled" value="Subir documentos y terminar" onclick="ShowAlertConfirm()" id="btn_subir_doc" class="btn btn-primary btn-block">
            @endif
        </div>
        <div class="col-md-1"></div>            
    </div>
</div>

@endsection
@if(isset($success))
@else
@section('scripts')

        <script defer> 

            const btnSubirDoc   = document.getElementById('btn_subir_doc'); 
            const input_check   = document.getElementById('confirm_doc'); 
            const NOT_BLOCK     = true;   
            const BLOCK         = false;
            var input_bachiller = null;
            
            function ShowAlertConfirm(){          
                
                if(validateDocumentsArePdf(true)){
                    Swal.fire({
                          title: '¿Estás seguro?',
                          text: "Si sus documentos no son correctos perdera su derecho de ingresar a la universidad o deberá ser sometido a revisión.",
                          icon: 'warning',
                          showCancelButton: true,
                          confirmButtonColor: '#3085d6',
                          cancelButtonColor: '#d33',
                          confirmButtonText: 'Si, de acuerdo!',
                          cancelButtonText: 'No. Revisar de nuevo'
                        }).then((result) => {
                            
                            if (result.value) {
                                document.getElementById('form_subir_documentos').submit();        
                            }else{
                                //presiono boton revisar de nuevo
                                let input_confirm= document.getElementById("confirm_doc");
                                input_confirm.checked = false;
                                input_confirm.value='N';                        
                                blockBtnSubmit(BLOCK);
                            }
                        
                        });
                }
            }

            function clickBachiller(input_value){
                const constancia  = 'constancia';
                const certificado = 'certificado';
                const input_constancia  = document.getElementById('const_bachillerato_id');
                const input_certificado = document.getElementById('cert_bachillerato_id');
                const label_constancia  = document.getElementById('label_constancia_id');
                const label_certificado = document.getElementById('label_certificado_id');                

                if (input_value == constancia) {
                    label_constancia.removeAttribute('hidden');
                    input_constancia.removeAttribute('hidden');
                    label_certificado.setAttribute('hidden','hidden');
                    input_certificado.setAttribute('hidden','hidden');
                    input_certificado.setAttribute('disabled','disabled');

                    input_bachiller = input_constancia;
                }
                else if (input_value == certificado) {
                    label_constancia.setAttribute('hidden', 'hidden');
                    input_constancia.setAttribute('hidden', 'hidden');
                    label_certificado.removeAttribute('hidden');
                    input_certificado.removeAttribute('hidden');
                    input_certificado.removeAttribute('disabled', 'disabled');

                    input_bachiller = input_certificado;
                }               
            }

            function blockBtnSubmit(not_block){                          
                btnSubirDoc.setAttribute("disabled", "disabled");                            
                if (not_block) {
                    btnSubirDoc.removeAttribute("disabled");                                          
                }
            }

            function validateDocumentsArePdf(checked){
                blockBtnSubmit(BLOCK);
                input_check.value='N';

                if (checked) {
                    let doc_acta         = document.getElementById("acta_nac_id").value;
                    let doc_curp         = document.getElementById("curp_id").value;                    
                    let doc_bachillerato = input_bachiller.value;
                    let acta_pdf         = doc_acta.substr(-4,4);
                    let curp_pdf         = doc_curp.substr(-4,4);
                    let bachiller_pdf    = doc_bachillerato.substr(-4,4);                    

                    if (acta_pdf == '.pdf' && curp_pdf == '.pdf' && bachiller_pdf == '.pdf') {
                         blockBtnSubmit(NOT_BLOCK);                  
                         input_check.value='S';
                         input_check.checked=true;
                         return true;
                    }else{
                        alert('PORFAVOR SELECCIONE ARCHIVOS VALIDOS (.pdf)');
                        input_check.checked=false;
                        return false;
                    }                
                }
            }
        </script>
@endsection
@endif