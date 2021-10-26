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
        return $this->belongsTo('App\Models\User');
    }
    public function permiso()
    {
        return $this->belongsTo('App\Models\Permission');
    }
}
