<?php


use Illuminate\Database\Seeder;
use App\Models\Vinculacion\Administrativo;

class Insert_Administrativo_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Administrativo::create([
            'id' => 1,
    		'tel_oficina' => '9971248560',
    		'emergencia_persona' => 'Candelaria del Rosario',
    		'emergencia_tel' => '99712586450',
    		'trabajo_anterior' => 'Profesor tiempo completo',
    		'cargo_anterior' => 'Profesor',
    		'creado_por' => 1,
    		'editado_por' => 1,
    		'empleado_id' => 1
    	]);
       
    }
}
