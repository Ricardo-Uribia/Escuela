<?php

use Illuminate\Database\Seeder;
use App\Models\Empleados\Empleado;

class Insert_Empleado_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Empleado::create([
            'id' => 1,
    		'nombre' => 'Gaspar',
    		'ap_paterno' => 'Castillo',
    		'ap_materno' => 'Ocampo',
    		'num_empleado' => '20150101',
    		'genero' => 'H',
    		'fecha_nacimiento' => '1998-06-27',
            'fecha_ingreso' => '2020-01-04',
    		'domicilio' => 'Calle 30',
    		'estado_civil' => 'S',
    		'nss' => 'S/N',
            'titulado' => false,
            'maestria' => false,
            'doctorado' => false,
            'post_doctorado' => false,
    		'cedula_fiscal' => 'S/N',
    		'clave_ciudadana' => 'S/N',
    		'municipio_nacimiento' => 'Maxcanu',
    		'municipio_actual' => 'Maxcanu',
    		'ciudad_actual' => 'Maxcanu',
    		'estado_nacimiento_id' => 31,
    		'estado_id_actual' => 31,
    		'user_id' => 1,
            'tipo' => '2'

    	]);
    }
}
