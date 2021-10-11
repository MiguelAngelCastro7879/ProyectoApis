<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionsController extends Controller
{
    public function getAllPermissions(){
        return Permission::all();
    }

    public function getPermissionById(){
        return Permission::find(3);
    }
    
    public function getPermissionWhere(){
        return Permission::where('descripcion','=','Te permite crear nuevos archivos')->get();
    }
    public function getPermissionDescription(){
        return Permission::select('descripcion')->get();
    }
    
    public function getPermissionUser(){
        return Permission::select('permissions.nombre as Permiso','u.name as User')
        ->join('permissions_roles AS pr',
               'pr.permission_id',
               '=',
               'permissions.id')
        ->join('roles as r',
               'r.id',
               '=',
               'pr.roll_id')
        ->join('users as u',
               'u.roll_id',
               '=',
               'r.id')->get();
    }
    
}
