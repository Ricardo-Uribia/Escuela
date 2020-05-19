<?php

use Illuminate\Database\Seeder;
use App\Models\Configuracion\ActividadTrabajo;
class Insert_Actividades_Trabajo_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     * Actividades que se usa en el registro del alumno
     * @return void
     */

    private $nombres= array(null,    	
    	'AMA/O DE CASA',
    	'ARTESANO (PRODUCTOS DE MADERA, BARRO, CUERO, YESO, ...etc.)',
    	'COMERCIANTE (PROPIETARIO DE ESTABLECIMIENTO COMERCIAL)',    	
    	'DESEMPLEADO',
    	'DIRECTIVO DE EMPRESA (SUBGERENTE, GERENTE, DIRECTOR, ETC.)',    	
    	'EMPRESARIO, ACCIONISTA DE EMPRESAS',
    	'EMPLEADO DE LA INDUSTRIA O DE LA BANCA',
    	'EMPLEADO GOB. MUNICIPAL, ESTATAL O FEDERAL (INCLUYE MILITAR)',
    	'EMPLEADO DE LA INDUSTRIA O DE LA BANCA','EMPLEADO DE INST. GUBERNAMENT. DESCENTR. (IMSS, ISSSTE, ETC)',
    	'FUNCIONARIO (MEDIO ALTO) DE INST. GUBERN. MUNICP. EST. O FED',
    	'GANADERO Y/O PRODUCTOR AGRÍCOLA (PROPIETARIO O COPROPIET.)',    	
    	'JUBILADO O PENSIONADO', 
    	'MAESTRO DE PREESCOLAR, PRIMARIA O SECUNDARIA','EMPLEADO DE ESTABLECIMIENTOS COMERCIALES O DE SERVICIOS',
    	'OBRERO DE LA INDUSTRIA O MAQUILADORA','OPERADOR DE TRANSPORTE (CHOFER, TAXISTA, FLETERO)',
    	'PEQUEÑO COMERCIANTE (INSTALADO O AMBULANTE)', 
    	'PRESTADOR DE SERVICIOS PERSONALES (JARDINERO, PLOMERO, ETC)',
    	'PROFESIONISTA QUE TRABAJA POR SU CUENTA (MÉDICOING. ETC)',
    	'PROFESOR DE BACHILLER O UNIVERSIDAD (INCLUYE FUNCIONARIOS)',    	
    	'PROPIETARIO DE CASAS EN RENTA',
    	'PROFESIONISTA QUE TRABAJA POR SU CUENTA (MÉDICO, ING. ETC.)',
    	'POLÍTICO (PUESTO DE ELECCIÓN POPULAR)',    	    	  
    	'NINGUNA DE LAS ANTERIOIRES',
        'SIN DATO'
    );

    public function run()
    {
    	for ($i=1; $i < count($this->nombres); $i++) {     		
	        ActividadTrabajo::create(['id' => $i,'nombre' => $this->nombres[$i]]);    		
    	}
    }
}
