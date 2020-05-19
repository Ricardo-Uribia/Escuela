<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cfgstatus extends Model
{
    protected $fillable = [
     'Status', 'descripcionStatus', 'activoStatus'
    ];

    protected $table = 'cfgstatus';
    public $timestamps = false;
}
