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
    public function store(Request $request){
        
        $permiso=Permission::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion
        ]);

        return response()->json([
            'message' => 'Successfully created permission!',
            'permiso'=> $permiso
        ], 201);
    } 

    public function update($id,Request $request){
        $permiso = Permission::find($id);

        $permiso->descripcion = $request->descripcion;

        $permiso->save();

        return  response()->json([
            'message' => 'Successfully updated product!',
            'permiso' => $permiso
        ], 201);
    }

    public function delete($id){
        
        $permiso = Permission::find($id);
        $permiso->delete();
        return  response()->json([
            'message' => 'Successfully deleted perrmission!',
            'permission' => $permiso
        ], 201);
    }

}
    

