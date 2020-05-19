<?php

use Illuminate\Database\Seeder;
use App\Models\Configuracion\Escolaridad;

class Insert_Escolaridades_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $nombres= array(null, 
    	'BACHILLERATO COMPLETO / EDUC. SUPERIOR INCOMPLETA',
    	'EDUC. TÉCNICA COMPLETA O NORMAL BÁSICA',
    	'EDUC. SUPERIOR O NORMAL SUP. COMP./ POSTGRADO INC',
    	'ESTUDIOS DE POSTGRADO (MAESTRÍA O DOCTORADO) COMP.',
    	'PRIMARIA TERMINADA / SECUNDARIA INCOMPLETA',
    	'SIN DATO' ,
    	'SIN ESCOLARIDAD / ALGUNOS AÑOS DE PRIMARIA',
    	'SECUNDARIA O COMERCIAL TERMINADA / BACH. INCOMPLETO'
    );

    public function run()
    {
        for ($i=1; $i < count($this->nombres); $i++) {     		
	        Escolaridad::create(['id' => $i,'nombre' => $this->nombres[$i]]);    		
    	}
    }
}
