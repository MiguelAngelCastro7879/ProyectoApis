<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
 
class RolesController extends Controller
{
    
    public function getAllRoles(){
        return Role::all();
    }

    public function getRollById($id){
        return Role::find($id);
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
    public function store(Request $request){
        
        $roll=Role::create([
            'nombre'=>$request->nombre,
            'descripcion'=>$request->descripcion
        ]);

        return response()->json([
            'message' => 'Successfully created rol!',
            'roll'=>$roll
        ], 201);
    } 

    public function update($id,Request $request){
        $roll = Role::find($id);

        $roll->nombre = $request->nombre;
        $roll->descripcion = $request->descripcion;

        $roll->save();


        return  response()->json([
            'message' => 'Successfully updated roll!',
            'product_After' => $roll
        ], 201);
    }

    public function delete($id){
        
        $roll = Role::find($id);
        $roll->delete();
        return  response()->json([
            'message' => 'Successfully deleted roll!',
            'roll' => $roll
        ], 201);
    }

}