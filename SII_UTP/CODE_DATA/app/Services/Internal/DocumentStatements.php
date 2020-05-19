<?php

namespace App\Services\Internal;

class DocumentStatements
{

	//paths	
	public static $PATH_DOCUMENTS = '/documentos_,';	

	public static $PATH_ALUMN = "/documentos_,/alumnos_/";
	public static $PATH_PROF  = '/documentos_,/profesores_/';
	public static $PATH_VINCU = '/documentos_,/vinculacion_/';
	public static $PATH_OTROS = '/documentos_,/otros_/';


    //IMAGES
    public static $PATH_ALUMN_IMG = "/fotos_,/alumnos_/";
    public static $PATH_EMPLE_IMG = "/fotos_,/empleados_/";

	//sufix
	public static $SFX_ALUM = '_alum_';
	public static $SFX_PROF  = '_prof_';
	public static $SFX_VINCU = '_vinc_';
	public static $SFX_OTROS = '_otro_';

	//claves 
    public static $CV_FOTOGRAFIA = 'IMG';

    public static $CV_ACTA_NACIMIENTO = 'AN';
    public static $CV_CURP            = 'CURP';
    public static $CV_CONST_BACHILLER = 'C_B';
    public static $CV_CERT_BACHILLER  = 'CERT_B';
    public static $CV_FCH_PAGO_REGISTRO = 'REG';
	
	//names
	public static $NM_ACTA_NACIMIENTO   = 'ACTA DE NACIMIENTO';
    public static $NM_CURP              = 'CURP';
    public static $NM_CONST_BACHILLER   = 'CONSTANCIA DE BACHILLERATO';
    public static $NM_CERT_BACHILLER    = 'CERTIFICADO DE BACHILLERATO';
    public static $NM_FCH_PAGO_REGISTRO = 'FICHA PAGO DE REGISTRO';

    public static $CEDULA_PROFECIONAL	= 'CED_PROF_';
    public static $TITULO_PROFECIONAL	= 'TITUL_PROF_';












	//Functions 

    public static function getNamesToArray(){
    	$ACTA  = static::$NM_ACTA_NACIMIENTO;
    	$CURP  = static::$NM_CURP;
    	$CONST = static::$NM_CONST_BACHILLER;
    	$CERT  = static::$NM_CERT_BACHILLER;  
    	$PAGO_REG = static::$NM_FCH_PAGO_REGISTRO;
    	
    	return array($ACTA, $CURP, $CONST, $CERT, $PAGO_REG); 
    }

    public static function getDoctosRequeridosParaRegAlumno(){    	
    	return array(static::$NM_ACTA_NACIMIENTO, static::$NM_CURP, static::$NM_CONST_BACHILLER, static::$NM_CERT_BACHILLER, static::$NM_FCH_PAGO_REGISTRO);
    }



   	//Especial Functions

    //get array with the same key that the value
    public static function getNamesToArraySameKeyValue(){    	
    	return array_combine(static::getNamesToArray(), static::getNamesToArray());    
    }

    //Search value on array
    public static function searchIndexWithName($name, $array){
    	return array_search($name, $array, false);
    }

    public static function getIndexOnArrayNamesWithName($name){
    	return array_search($name,static::getNamesToArray(),false);
    }


  
}


