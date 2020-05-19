<?php

namespace App\Http\Controllers\Frontend\Adicionales;

use App\Http\Controllers\Controller;
use App\Models\Alumnos\Alumno;
use App\Models\Configuracion\Cfgstatus;
use App\Models\Configuracion\Estado;
use App\Models\Documento;
use App\Models\Vinculacion\Nivel;
use App\Services\Internal\CRUDControllersInterface;
use App\Services\Internal\DocumentStatements as DSts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Models\Alumnos\FolioAlumno;
use Illuminate\Support\Facades\Hash;
use App\Models\Configuracion\Carrera;
use App\Models\Configuracion\TokenFicha;
use App\Services\DB\DBDev;
use App\Models\Configuracion\Ciclo;
use App\Models\Alumnos\Grupo;
use PDF;
use DB;
use Exception;

class AlumnosController extends Controller implements CRUDControllersInterface
{
    protected static $tipo_pdf_fichaPago     = 1;
    protected static $tipo_pdf_fichaRegistro = 2;

    //GET
    public function index(){}   

    //GET
    public function show(){}

    //GET
    public function createForm()
    {   
        $nivel           = Nivel::where('abr_nivel', 'like', '%tsu%')->first();
        try{
            $carreras        = Carrera::where('nivel_id', $nivel->id)->get();
            $cfgstatusAlumno = Cfgstatus::where('status', 1)->where('descripcion', 'like', '%aspirante%')->first();
            $estados         = Estado::select('id', 'nom_ent')->get();
            return view('Frontend.Formularios.createAlumno', compact('nivel','cfgstatusAlumno','estados','carreras'));        
            
        }catch(Exception $e){
            return "No cuenta con los suficientes datos para realizar su inscripcion";        
        }
        
    }

    //POST
    public function create(Request $r)
    {
        $existeAlumnoMismoCurp = Alumno::select('id')->where('curp', $r->curp)->orWhere('email',$r->email)->first();
        if (is_null($existeAlumnoMismoCurp) || empty($existeAlumnoMismoCurp)) {
                
                $request = $r->except(['_token','grupo_id', 'carrera_id','fotografia']);     
                $folio_creado    = DBDev::generarFolio(); 
                $folio_recuperado= FolioAlumno::select('id')->where('folio',$folio_creado)->first();
                $folio_id_creado = $folio_recuperado['id'];
                
                if ($r->hasFile('fotografia')) {
                    $path    = storage_path().DSts::$PATH_ALUMN_IMG;
                    $archivo_r     = $r->file('fotografia');    
                    $original_name = $r->file('fotografia')->getClientOriginalName();
                    $explode       = explode(".", $original_name);
                    $extension     = end($explode);
                    $nombre_foto  = DSts::$CV_FOTOGRAFIA.DSts::$SFX_ALUM.$folio_creado.".".$extension;
                    $request['fotografia'] = $nombre_foto;
                    $archivo_r->move($path, $nombre_foto);
                }
              
                $request['folio_alumno_reg_id'] = $folio_id_creado;   
                $alumno                         = Alumno::create($request);       
                $alumno->grupos()->attach($r->grupo_id);
                return view('Frontend.Formularios.subirDocumentosAlumno', ['alumno' => $alumno]);
        }
        
        Session::flash('error', "Su ficha de registro no pudo ser creada, DEBIDO A QUE EXISTE UN ALUMNO YA REGISTRADO CON LA CURP QUE INGRESO O CON EL EMAIL INGRESADO en nuestro sistema. \n 
            *** Para poder subir sus documentos o descargar su ficha de ingeso, digÃ­te su CURP en el campo que se le indica. ***");
        return redirect('/pub/alumnos/createForm');
    }

    //POST 
    public function getGruposFromNivel(Request $r){              
        $ciclo              = Ciclo::select('id')->get()->last();
        $grupos             = Grupo::select('id','codigo','cupo_maximo')
                                    ->where('ciclo_id', $ciclo->id)
                                    ->where('carrera_id', $r->carrera_id)
                                    ->get();

        $state = 404;
        $data  = "No se encontraron grupos disponibles en esta carrera.\n No es posible continuar con su registro.\n Reportelo a control escolar.";

        foreach ($grupos as $grupo) {             
            $alumnosGrupo = $grupo->alumnos;
            if (count($alumnosGrupo) < $grupo->cupo_maximo){                    
                $state = 200;
                $data  = $grupo->id; 
                break;
            }
        }        

        return response()->json(['state' => $state, 'data' => $data ]);
    }

    //POST    
    public function details(Request $r)
    {
        $alumno    = Alumno::where('curp',$r->curp_alumno)->select('id', 'nombres', 'materno', 'paterno', 'email')->first(); 
        $state = 200;
        $data  = $alumno;

        if (is_null($alumno)) {                                
            $state = 404;
            $data  = "No se encontro la CURP ingresada en nuestros registros.\n YA PUEDES CONTINUAR CON TU REGISTRO.";
        }
        return response()->json(['state' => $state, 'data' => $data]);
    }

    //POST
    public function sendMailConfirmIdentitityAlumn(Request $r){
        $alumno = $this->findAlumnoExistToArray($r->email);    
        $email_to = $alumno->email;
    
        $al= Mail::send('Mails.confirmIdAlumnToken',$alumno->toArray(), function($mail) use ($email_to){
            $mail->subject('Confirmaci¨®n de identidad || Registro de alumno || Ficha'); 
            $mail->to($email_to);
        });                                    
        
        
        Session::flash('success', 'Se le ha enviado un correo de acceso para visualizar sus datos y su ficha de registro.');        
        return redirect('/pub/alumnos/createForm');  
    }

    //RETURN OBJECT OR REDIRECT IF NOT EXIST
    private function findAlumnoExistToArray($email){
        $alumno = Alumno::select('id', 
                                 'nombres', 
                                 'materno', 
                                 'paterno', 
                                 'email',
                                 'folio_alumno_reg_id',
                                 'curp')->where('email', $email)->first();

        if (is_null($alumno) || empty($alumno)) {                                        
            Session::flash('error', 
                           'No se pudo enviar el correo de confirmaciÃ³n.. porfavor vuelva a intentar.');
            return redirect('/pub/alumnos/createForm');            
        }
        $alumno['folio_alumno']  = $alumno->folio->folio;         
        $alumno['_token_acceso'] = $this->makeTokenFicha($alumno);        
        return $alumno;
    }
    //RETURN STRING 
    private function makeTokenFicha($alumno): string {
        
        $fecha_actual_mas_dos_dias = date("Y-m-d H:i:00", strtotime(date("d-m-Y")."+ 2 days")); 
        $_token       = str_replace ('/', '', Hash::make(time().Hash::make($alumno->curp.$alumno->nombres.$alumno->email.time()))); 
        $existente_token = TokenFicha::where('curp_alumno', $alumno->curp)->first();

        if (is_null($existente_token)) {
            $nuevo_token              = new TokenFicha();
            $nuevo_token->curp_alumno = $alumno->curp;
            $nuevo_token->_token      = $_token;
            $nuevo_token->fecha_expira= $fecha_actual_mas_dos_dias;        
            $nuevo_token->save();                
        }else{
            $existente_token->fecha_expira = $fecha_actual_mas_dos_dias;
            $existente_token->_token       = $_token;
            $existente_token->save();            
        }

        return $_token;
    }

    //POST
    public function uploadDocuments(Request $r)
    {                
        $alumno = Alumno::find($r->alumno_id);    
        
        if ($alumno->folio_alumno_reg_id != null && $r->hasFile('archivo_act_nacimiento') && $r->hasFile('archivo_curp') && $r->hasFile('archivo_bach')) {

            $archivo_acta_nac    = $r->file('archivo_act_nacimiento');
            $archivo_curp        = $r->file('archivo_curp');
            $archivo_bach        = $r->file('archivo_bach');            
            $alumno_folio        = $alumno->folio->folio;               
            $path                = storage_path() . DSts::$PATH_ALUMN;
            $nom_doc_acta        = DSts::$CV_ACTA_NACIMIENTO.DSts::$SFX_ALUM.$alumno_folio.".pdf";
            $nom_doc_curp        = DSts::$CV_CURP.DSts::$SFX_ALUM. $alumno_folio.".pdf";
            $nom_doc_bac         = DSts::$CV_CERT_BACHILLER.DSts::$SFX_ALUM.$alumno_folio.".pdf";      
            $descripcion_doc_bac = 'Certificado de bachiller - Ficha Registro';
            $nom_doc_bac_        = DSts::$NM_CERT_BACHILLER;      
            
            if ($r->bachiller_ == "constancia") {
                $nom_doc_bac = DSts::$CV_CONST_BACHILLER.DSts::$SFX_ALUM.$alumno_folio.".pdf";
                $descripcion_doc_bac = 'Constancia de bachiller - Ficha Registro'; 
                $nom_doc_bac_        = DSts::$NM_CONST_BACHILLER;      
            }                    

            if ($archivo_acta_nac->move($path, $nom_doc_acta) &&
                $archivo_curp->move($path, $nom_doc_curp) &&
                $archivo_bach->move($path, $nom_doc_bac)) {

                $doc_act= new Documento();
                $doc_act->nombre= DSts::$NM_ACTA_NACIMIENTO;
                $doc_act->recibido= 'S';
                $doc_act->descripcion= 'Acta de nacimiento - Ficha Registro';
                $doc_act->archivo= $nom_doc_acta;
                $doc_act->alumno_id= $alumno->id;
                $doc_act->save();

                $doc_curp = new Documento();
                $doc_curp->nombre= DSts::$NM_CURP;
                $doc_curp->recibido= 'S';
                $doc_curp->descripcion= 'CURP - Ficha Registro';
                $doc_curp->archivo= $nom_doc_curp;
                $doc_curp->alumno_id= $alumno->id;
                $doc_curp->save();

                $doc_cons_bac = new Documento();
                $doc_cons_bac->nombre= $nom_doc_bac_;
                $doc_cons_bac->recibido= 'S';
                $doc_cons_bac->descripcion= $descripcion_doc_bac;
                $doc_cons_bac->archivo= $nom_doc_bac;
                $doc_cons_bac->alumno_id= $alumno->id;
                $doc_cons_bac->save();        
                
                $alumno->acepto_terminos_documentos="S";
                $alumno->save();                

                 return view('Frontend.Formularios.subirDocumentosAlumno', ['alumno' => $alumno, 'success' => 'Se han guardado sus documentos satisfactoriamente, <b class="text-danger">descargue su ficha de pago.</b>']);

            }else {
                unlink($path . $nom_doc_acta);
                unlink($path . $nom_doc_curp);
                unlink($path . $nom_const_bac);
                Session::flash('error', 'No se pudo guardar sus documentos, ingrese en el campo indicado para subir sus documentos de nueva cuenta.');
                return redirect('/pub/alumnos/createForm');
            }
        } else {
            Session::flash('error', 'No se pudo guardar sus documentos, ingrese en el campo indicado para subir sus documentos de nueva cuenta.');
            return redirect('/pub/alumnos/createForm');
        }
    }

    //POST
    public function downloadPDF(Request $r){
        $tipoPDF= $r->tipoPDF;                

        switch ($tipoPDF) {
            case self::$tipo_pdf_fichaPago:
                $alumno  =  Alumno::find($r->alumno_id);  
                $carrera = null;

                foreach ($alumno->grupos as $grupo) {                        
                    $nivel         = $grupo->carrera->nivel;
                    $identificador = $nivel->identificador;
                    
                    if( $identificador == "TSU" || $identificador == "tsu"){                        
                        $carrera = $grupo->carrera->descripcion;
                        break;
                    }
                }
                $alumno['alumno_folio'] = $alumno->folio->folio;    
                $alumno['carrera']      = $carrera;                 
                $alumno['fecha_registro_formated'] = date( "d/m/Y", strtotime($alumno->fecha_registro));

                $pdf = PDF::loadView('Pdfs.pub_ficha_pago_alumno', $alumno);   
                return $pdf->download('FICHA DE PAGO EXANI II.pdf');
                break;
            case self::$tipo_pdf_fichaRegistro:
                $alumno  =  Alumno::find($r->alumno_id);  
                $carrera = null;

                foreach ($alumno->grupos as $grupo) {                        
                    $nivel         = $grupo->carrera->nivel;
                    $identificador = $nivel->identificador;
                    if( $identificador == "TSU" || $identificador == "tsu"){
                        $carrera = $grupo->carrera->descripcion;
                        break;
                    }
                }
                $documentos = Documento::select('id','nombre')->where('alumno_id', $alumno->id)->get();
                
                $alumno['documentos']   = $documentos;
                $alumno['alumno_folio'] = $alumno->folio->folio;    
                $alumno['carrera']      = $carrera;                 
                $alumno['fecha_registro_formated'] = date( "d/m/Y", strtotime($alumno->fecha_registro));
                
                $pdf = PDF::loadView('Pdfs.pub_ficha_registro_alumno', $alumno);
                return $pdf->download('HOJA DE REGISTRO EXANI II.pdf');
                break;
            default:
                return null;
                break;
        }
    }

    //GET
    public function updateForm(Request $r){}

    //POST
    public function update(Request $r){}

    //POST JSON
    public function fetch(){}

    //POST
    public function delete(Request $r){}

    //POST
    public function destroy($id){}

    //POST 
    public function makeChallengeAndRedirect($token_){
        $_token           = TokenFicha::where('_token', $token_)->first();
        $fecha_actual     = strtotime(date("d-m-Y H:i:00",time())); 

        
        if (!is_null($_token) || !empty($_token)) { 
            $fecha_expiracion = strtotime($_token->fecha_expira);            
            
            if($fecha_actual < $fecha_expiracion) {
                //no ha expirado            
                $alumno     = Alumno::where('curp', $_token->curp_alumno)->first();
                $documentos = Documento::select('id','nombre','descripcion','archivo')->where('alumno_id', $alumno->id)->get();
                
                if (!is_null($alumno) || !empty($alumno)) {                
                    return view('Frontend.Adicionales.soloAcceso_token_verFicha', ['alumno' => $alumno, 'documentos' => $documentos, '_token'=>$_token->_token]);
                }
                return "No se encontro el alumno con el token solicitado, vuelva a intentar o reiniciela ingresando su curp en la seccion indicada.";
            }else{
               return "El tiempo de acceso para ver su ficha ha expirado, por favor, reiniciela ingresando su curp en la seccion indicada.";
            }     
        }else{
            return  "El token de acceso no es el correcto, vuelva a intentar o reiniciela ingresando su curp en la seccion indicada.";
        }            

        //return redirect('/pub/alumnos/createForm');            
    }

    //POST
    public function updateInfoAlumno (Request $r){
        $success= false;           
        $_token = $r->_token_al;

        if ($r->hasFile('documento')) {  
        //son documentos
        //exite archivo tipo file
            $path         = storage_path() . DSts::$PATH_ALUMN;            
            $documento_r  = $r->file('documento');            
            if (isset($r->documento_id)) {                
                //existe documento - reemplazalo
                $documento_db = Documento::find($r->documento_id);
                $nombre_documento = $documento_db->archivo;                    
                if(unlink($path.$nombre_documento)){                    
                    $documento_r->move($path, $nombre_documento);                
                    $documento_db->archivo = $nombre_documento;
                    $success= $documento_db->save();                    
                }
                return $this->returnViewAgain($success,null, $_token);                     

            }else{
            //aÃ±adir nuevo documento         
                $nombre;
                $archivo;
                $alumno_folio = $r->alumno_folio;                      
                switch ($r->nombre_documento) {
                    case 'ACTA':   
                            $nombre  = DSts::$NM_ACTA_NACIMIENTO;
                            $archivo = DSts::$CV_ACTA_NACIMIENTO.DSts::$SFX_ALUM.$alumno_folio.".pdf";
                        break;
                    case 'CURP':                        
                            $nombre  = DSts::$NM_CURP;
                            $archivo = DSts::$CV_CURP.DSts::$SFX_ALUM. $alumno_folio.".pdf";
                        break;
                    case 'CONSTANCIA':
                            $nombre  = DSts::$NM_CONST_BACHILLER;                        
                            $archivo = DSts::$CV_CONST_BACHILLER.DSts::$SFX_ALUM.$alumno_folio.".pdf";

                            $arc_cert = DSts::$CV_CERT_BACHILLER.DSts::$SFX_ALUM.$alumno_folio.".pdf";
                            $documento = Documento::where('archivo', $arc_cert)->first();

                            if ($documento != null) {                                
                                $documento->nombre = $nombre;
                                $documento->archivo = $archivo;
                                if (unlink($path.$arc_cert)) {                            
                                    ($documento->save()) ? $success= $documento_r->move($path, $archivo):'';
                                    return $this->returnViewAgain($success,null, $_token);     
                                }
                            }
                        break;
                    case 'CERTIFICADO':
                            $nombre  = DSts::$NM_CERT_BACHILLER;                        
                            $archivo = DSts::$CV_CERT_BACHILLER.DSts::$SFX_ALUM.$alumno_folio.".pdf";
                                                  
                            $arc_constancia= DSts::$CV_CONST_BACHILLER.DSts::$SFX_ALUM.$alumno_folio.".pdf";
                            $documento = Documento::where('archivo', $arc_constancia)->first();

                            if ($documento != null) {                                
                                $documento->nombre = $nombre;
                                $documento->archivo = $archivo;
                                if (unlink($path.$arc_constancia)) {                                    
                                    ($documento->save()) ? $success= $documento_r->move($path, $archivo):'';
                                    return $this->returnViewAgain($success,null, $_token);     
                                }
                            }
                        break;
                    case 'FICHA':
                            $archivo = DSts::$CV_FCH_PAGO_REGISTRO.DSts::$SFX_ALUM.$alumno_folio.".pdf";
                            $nombre  = DSts::$NM_FCH_PAGO_REGISTRO;                        
                        break;
                    default:                                                
                        return $this->returnViewAgain($success,null, $_token);     
                        break;
                }


                $documento_ = new Documento();                
                $documento_->nombre      = $nombre;
                $documento_->archivo     = $archivo;
                $documento_->recibido    = 'S';
                $documento_->descripcion = $nombre." SUBIDO EN EL PROCESO DE REGISTRO ";
                $documento_->alumno_id   = $r->alumno_id;

                ($documento_->save()) ?  $success= $documento_r->move($path, $archivo) :''; 

                return $this->returnViewAgain($success, null, $_token);                
                
            }            
        }else{
            //Es informacion     
            $request   = $r->except(['alumno_id', 'fotografia']);
            $alumno    = Alumno::find($r->alumno_id);
            
            if ($r->hasFile('fotografia')) {                                   
                               
                $path      = storage_path().DSts::$PATH_ALUMN_IMG;
                $archivo_r = $r->file('fotografia');    
                $nombre_foto;

                if ($alumno->fotografia != null) {                
                    unlink($path.$alumno->fotografia);  
                    $nombre_foto=$alumno->fotografia;                           
                }else{
                    $original_name =  $r->file('fotografia')->getClientOriginalName();
                    $array         = explode(".", $original_name);
                    $extension     = end($array);
                    $nombre_foto   =  DSts::$CV_FOTOGRAFIA.DSts::$SFX_ALUM.$alumno->folio->folio.".".$extension;
                    $request['fotografia'] = $nombre_foto;
                }

                $archivo_r->move($path, $nombre_foto);
            }                   

            $alumno->update($request);           
            return $this->returnViewAgain($alumno->save(), "info", $_token);
        }                
    }

    private function returnViewAgain($success, $type = null, $_token){        
        //Al paracer la sessino flash no funciona 
        //hay arreglarlo

        if ($success) {
            $message;        
            if ($type != null) {
                $message = 'Su informacion ha sido actualizada satisfactoriamente';
            }else{
                $message = 'Su documento ha sido guardado satisfactoriamente';
            }            
            Session::flash('success', 'mensaje x');
        }
        Session::flash('error','Oups.. no se pudo guardar su documento, por favor vuelva a intentar..');

        return redirect('/pub/tok_ficha/'.$_token);

    }   

}
