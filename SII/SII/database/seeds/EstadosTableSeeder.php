<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
		DB::table('ESTADOS')->insert([ 'NOMBRE' => 'Aguascalientes'	, 'CLAVE' =>'Ags.']);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Baja California', 'CLAVE' =>'BC']);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Baja California Sur', 'CLAVE' =>'BCS']);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Campeche', 'CLAVE' =>	'Camp.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Coahuila', 'CLAVE' =>	'Coah.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Colima', 'CLAVE' =>	'Col.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Chiapas', 'CLAVE' =>	'Chis.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Chihuahua', 'CLAVE' =>	'Chih.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Distrito Federal'	, 'CLAVE' =>'DF']);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Durango'	, 'CLAVE' =>	'Dgo.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Guanajuato'	, 'CLAVE' => 'Gto.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Guerrero', 'CLAVE' =>	'Gro.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Hidalgo', 'CLAVE' =>	'Hidal.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Jalisco', 'CLAVE' =>	'Jal.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'México', 'CLAVE' =>	'Mex.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Michoacán', 'CLAVE' =>	'Mich.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Morelos', 'CLAVE' =>	'Mor.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Nayarit', 'CLAVE' =>	'Nay.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Nuevo León', 'CLAVE' =>	'NL'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Oaxaca', 'CLAVE' =>	'Oax.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Puebla', 'CLAVE' =>	'Pue.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Querétaro', 'CLAVE' =>	'Qro.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Quintana Roo'	, 'CLAVE' =>'Q. Roo']);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'San Luis Potosí'	, 'CLAVE' =>'SLP']);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Sinaloa', 'CLAVE' =>	'Sin.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Sonora', 'CLAVE' =>	'Son.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Tabasco', 'CLAVE' =>	'Tab.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Tamaulipas', 'CLAVE' =>'Tamps.']);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Tlaxcala', 'CLAVE' =>	'Tlax.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Veracruz' , 'CLAVE' =>	'Ver.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Yucatán', 'CLAVE' =>	'Yuc.'	]);
		DB::table('ESTADOS')->insert([ 'NOMBRE' =>  'Zacatecas', 'CLAVE' =>	'Zac.'	]);
    }
}
