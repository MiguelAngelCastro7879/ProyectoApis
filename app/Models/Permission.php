<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    
    protected $permissions="permission";
    public $timestamps= false;
    protected $fillable = [
        'nombre',
        'descripcion'
    ];
    
    public function permiso()
    {
        return $this->belongsToMany(Role::class, 'permissions_roles', 'permission_id');
    }
}
