<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Permission;

class UsersController extends Controller
{
    public function getAllUsers(){
        return User::all();
    }

    public function getUserById(){
        return User::find(2);
    }
    
    public function getUserWhere(){
        return User::where('email','=','1@gmail.com')->get();
    }
    public function getUserNameEmail(){
        return User::select('name','email')->get();
    }
    
    public function getUserRoll(){
        return User::select('users.name','users.email','r.nombre as roll')
        ->join('roles as r',
               'users.roll_id',
               '=',
               'r.id')->get();
    }
    
    public function usuarioXpermiso($id){
        $usuario =  User::select('users.name','users.email','roles.nombre as roll', 'p.nombre as permiso')
        ->join('roles',
               'users.roll_id',
               '=',
               'roles.id')
        ->join('permissions_roles as pr',
               'pr.roll_id',
               '=',
               'roles.id')
        ->join('permissions as p',
               'p.id',
               '=',
               'pr.permission_id')
        ->where('users.id','=', $id)
        ->get();
        $collection = collect($usuario);

        $agrupado = $collection->mapToGroups(function ($item, $key) {
            return ['permiso' => $item['permiso']];
        });
        return  response()->json([
            'message' => 'Successfully updated roll!',
            'usuario' => [
                $usuario,
                $agrupado
            ]
        ], 201);
    }


    
}
