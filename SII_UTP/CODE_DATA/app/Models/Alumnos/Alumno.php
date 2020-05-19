<?php

namespace App\Models\Alumnos;

use Illuminate\Database\Eloquent\Model;
use App\Models\Configuracion\Estado;

class Alumno extends Model
{
    protected $table   = 'alumnos';
    public $timestamps = true;

    protected $guarded= [];
   
    public function setMismaAutorizadaAttribute($value)
    {
        $this->attributes['misma_autorizada'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    public function setSolicitaBecaUtpAttribute($value)
    {
        $this->attributes['solicita_beca_utp'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setAutorizaBecaUtpAttribute($value)
    {
        $this->attributes['autoriza_beca_utp'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setTuvoBecaBachilleratoAttribute($value){
        $this->attributes['tuvo_beca_bachillerato'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setOrigenIndigenaAttribute($value)
    {
        $this->attributes['origen_indigena'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setLenguaIndigenaAttribute($value)
    {
        $this->attributes['lengua_indigena'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setDiscapacidadAttribute($value)
    {
        $this->attributes['discapacidad'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setEnfermedadAttribute($value)
    {

        $this->attributes['enfermedad'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setAlergiasAttribute($value)
    {
        $this->attributes['alergias'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setAutomovilFamiliarAttribute($value)
    {
        $this->attributes['automovil_familiar'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setComputadoraAttribute($value)
    {
        $this->attributes['computadora'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setTieneHermanosAttribute($value)
    {
        $this->attributes['tiene_hermanos'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setTrabajasAttribute($value)
    {
        $this->attributes['trabajas'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setHijosAttribute($value)
    {
        $this->attributes['hijos'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
    public function setBecaTransporteAttribute($value)
    {
        $this->attributes['beca_transporte'] = filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    public function getNombreCompleto(){
         return $this->paterno." ".$this->materno." ".$this->nombres;
    }

    public function estadoReferencia($id_estado){
        return Estado::find($id_estado);
    }

    public function folio(){
        return $this->hasOne(FolioAlumno::class,'id','folio_alumno_reg_id');
    }
    public function cfgstatus(){
        return $this->hasOne('App\Models\Configuracion\Cfgstatus','id','cfgstatus_id');
    }
    public function estado(){
        return $this->hasOne('App\Models\Configuracion\Estado','id','estado_id');
    }

    public function grupos(){
        return $this->belongsToMany(Grupo::class,'alumno_grupos')->withTimestamps()->withPivot('id');
    }


}
