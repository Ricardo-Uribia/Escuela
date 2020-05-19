<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


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
        return $this->hasMany('App\Models\Empleado');
    }
}
