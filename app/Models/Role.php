<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    
    protected $roles="roles";
    public $timestamps= false;

    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    
    public function usuario()
    {
        return $this->hasMany(User::class, 'roll_id');
    }
    public function permiso()
    {
        return $this->belongsToMany(Permission::class, 'permissions_roles', 'roll_id');
    }
}
