<?php

namespace App\Services\DB;


class DBDev
{
    public static function generarFolio() : string{
    	$crear_folio     = json_encode(\DB::select('SELECT generarFolioEnFechaActual2()')[0]);
        $folio_creado    = (int) substr($crear_folio, -8, 6) ; 

        return $folio_creado;
    }
}
