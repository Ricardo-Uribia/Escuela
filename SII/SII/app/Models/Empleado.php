<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $primaryKey = 'id';
    protected $fillable = ['id','NombreEmpleado','txtPaterno','txtMaterno','NumEmpleado','foto','genero','fechaNacimiento','domicilio','estadoCivil',
            'numeroSeguroSocial','cedulaFiscal','claveCiudadana','cp','telefono','celular','email','fecha_Ingreso','fecha_Baja', 'departamento', 'cargo', 
            'contrato','sueldo','nivelEstudios','especialidad','titulado','institucionEstudios','cedulaProfecional','notasDescripcion','tipo', 'idTipo',
            'facebook','departamentoAnterior','cargoAnterior','empresaAnterior','maestria','nombreMaestria','institucionMaestria','tituloMaestria','cedulaMaestria',
            'doctorado', 'nombreDoctorado', 'institucionDoctorado', 'tituloDoctorado', 'cedulaDoctorado','postDoctorado','nombrePostDoctorado','institucionPostDoctorado',
            'tituloPostDoctorado', 'cedulaPostDoctorado', 'estadoz', 'municipio', 'estadoActual', 'muniActual', 'ciudad','ciudadActual','StatusActual']; 
    public $timestamps = false;

    public function estado(){
        return $this->belongsTo('App\Models\Estado');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function administrativos(){
        return $this->hasMany('App\Models\Administrativos', 'idEmpleado');
    }

    public static function empleado($id){
        return Empleado::where('id', $id)->get();
    }

    public function caja(){
        return $this->hasOne('App\Models\Caja');
    }
    
    public function profesores(){
        $this->hasMany('App\Profesor','id','idEmpleado');
    }


}
