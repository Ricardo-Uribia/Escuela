<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Empleados\Empleado;
use App\Models\Configuracion\Ciclo;

class User extends Authenticatable
{
    use Notifiable;

   
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getCiclos()
    {
        return Ciclo::all();
    }

    public function getEmpleadoInfo($id){
        return Empleado::where('user_id', $id)->first();
    }

    public function getIsAdminAttribute($value)
    {
        return $this->role == "1";
    }

    public function getIsTeacherAttribute($value)
    {
        return $this->role == "2";
    }

    public function getIsStudentsAttribute($value)
    {
        return $this->role == "4";
    }

    public function getIsMagalyAttribute($value)
    {
        return $this->role == "5";
    }

    public function getIsPrincipalAttribute($value)
    {
        return $this->role == "3";    
    }

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
