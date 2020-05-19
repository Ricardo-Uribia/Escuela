<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    protected $fillable = [
       'nombre', 'estado_id'
    ];

     protected $table = 'towns';
    public $timestamps = true;


    public static function towns($id)
    {
    	return Town::where('estado_id', $id)->get();
    }

    public function estado(){

    	return $this->belongsTo('App\Models\Estado');
    }
}
