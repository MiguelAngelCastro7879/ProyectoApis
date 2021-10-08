<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RolesController extends Controller
{
    
    public function getAllRoles(){
        return Role::all();
    }

    public function getRollById(){
        return Role::find(1);
    }
    
    public function getRolesWhere(){
        return Role::where('descripcion','=','es el que crea nuevos archivos')->get();
    }
    public function getRolesDescription(){
        return Role::select('nombre','descripcion')->get();
    }
    
    public function getRolesPermission(){
        return Role::select('roles.nombre','p.nombre as permisos')
        ->join('permissions_roles as pr',
               'pr.roll_id',
               '=',
               'roles.id')
        ->join('permissions as p',
               'p.id',
               '=',
               'pr.permission_id')->get();
    }
}
