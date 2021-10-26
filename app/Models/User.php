<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
//use Laravel\Sanctum\HasApiTokens;
use Laravel\Passport\HasApiTokens;
//Se referencia la el HasApiTokens para poder hacer uso de sus funciones

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $users="users";
    public $timestamps=true;
    
    public function rol()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
