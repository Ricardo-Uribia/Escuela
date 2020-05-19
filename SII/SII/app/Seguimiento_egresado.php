<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento_egresado extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'seguimiento_egresados';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'idSeguimientoegresados'; 

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idSeguimientoegresados', 'matricula', 'idCiclo', 'nombre', 'id', 'estadocivil_egresado', 'estatus_titulacion', 'porcentaje_rubros', 'porcentaje_cual', 'beca_principal', 'telefono_casa_a', 'celular_a', 'telefono_contacto_a', 'parentezco_contacto_a', 'domicilio_particular', 'colonia_particular', 'municipio_particular', 'estado_particular', 'nombre_empresa', 'domicilio_laboral', 'estado_laboral', 'domicilio_contacto', 'colonia_contacto', 'municipio_contacto', 'estado_contacto', 'parentezco_contacto', 'apartado_postal', 'email_a', 'email2', 'email_laboral', 'facebook_a', 'twitter', 'ref_fam1', 'tel_fam1', 'email_fam1', 'ref_fam2', 'tel_fam2', 'email_fam2', 'ref_laboral1', 'tel_ref_laboral1', 'email_ref_laboral1', 'ref_laboral2', 'tel_ref_laboral2', 'email_ref_laboral2', 'ref_escolar1', 'tel_ref_escolar1', 'email_ref_escolar1', 'ref_escolar2', 'tel_ref_escolar2', 'email_ref_escolar2', 'trabajas_actual', 'razon_no_trabajo', 'nombre_jefe', 'puesto_jefe', 'telefono_jefe', 'extension_jefe', 'email_jefe', 'tiempo_primer_trabajo', 'regimen_trabajo', 'tama«Ðo_trabajo', 'puesto_actual', 'coincidencia_formacion_ut', 'ingreso_mensual', 'medio_obtencion_trabajo', 'estudias_actual', 'tipo_institucion_actual', 'nombre_institucion_actual', 'nivel_academico_planteado', 'nombre_institucion_nivel'];

 

    public function Ciclo()
    {
        return $this->belongsTo('App\Models\Ciclo', 'idCiclo');
    }

    public function Niveles()
    {
        return $this->belongsTo('App\Models\Niveles', 'id');
    }
    
}
