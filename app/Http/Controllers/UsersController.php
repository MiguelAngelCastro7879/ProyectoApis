<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Role;

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
        $usuario=  User::find($id);
        $permiso=$usuario->roll->permiso;
        return  response()->json([
            'user' => $usuario,
        ], 201);
    }


    
}
