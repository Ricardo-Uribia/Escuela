<?php

namespace App\Services\Internal;

class StaticArrays
{


	public static function getGeneros(){
		$values     = array('Masculino','Femenino');
		$references = array('M', 'F');
		return $generos= compact('references', 'values');
	}


	public static function getEstadosCiviles(){
		$values     = array('Soltero /(a)','Casado', 'Divorciado', 'Viudo', 'Unión libre');
		$references = array('S', 'C', 'D', 'V', 'U');

		return $estados_civiles= compact('references', 'values');
	}

	public static function getParentescos(){
		$values     = array('Padre','Madre','Hermano', 'Pariente', 'Cónyugue', 'Amigo', 'Tutor', 'Otro');
		$references = array('P','M','H','Pa','C', 'Am', 'T', 'O');
		return $parentescos= compact('references', 'values');
	}

	public static function getTiposBachiller(){
		$values     = array('Abierto','Propedeutico', 'Técnologico');
		$references = array('A','P','T');
		return $tipos_bachiller = compact('references', 'values');
	}

	public static function getSistemasBachiller()
	{
		$same = array('BACHILLERATO ABIERTO', 
					  'CBTA (TECNOLÓGICO)', 'CBTA (TECNOLÓGICO)','CBTIS (TECNOLÓGICO)', 
					  'CECYT (TECNOLÓGICO)', 'COLEGIO DE BACHILLERES (PROPEDEUTICO)',
					  'CONALEP (TECNOLÓGICO)', 'PREPARATORIAS ESTATALES (PROPEDEUTICO)',
					  'PREPARATORIAS INCORPORADAS A LA UADY (PROPEDEUTICO)',
					  'TELEBACHILLERATO (PROPEDEUTICO)');
		$values     = $same;
		$references = $same;
		return $sistemas_bachiller = compact('references', 'values');
	}


	public static function getLenguasIndigenas(){
		$same = array('MAYA', 'GUASTECO', 'TOTONACA', 'OTRO');
		$values     = $same;
		$references = $same;
		return $lenguas_indigenas = compact('references', 'values');
	}
	
}