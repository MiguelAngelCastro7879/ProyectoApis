<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;
Route::post('/users', [UsersController::class, 'getAllUsers']);
Route::post('/users/id', [UsersController::class, 'getUserById']);
Route::post('/users/where', [UsersController::class, 'getUserWhere']);
Route::post('/users/email', [UsersController::class, 'getUserNameEmail']);
Route::post('/users/roll', [UsersController::class, 'getUserRoll']);



Route::post('/roles', [RolesController::class, 'getAllRoles']);
Route::post('/roles/id', [RolesController::class, 'getRollById']);
Route::post('/roles/where', [RolesController::class, 'getRolesWhere']);
Route::post('/roles/description', [RolesController::class, 'getRolesDescription']);
Route::post('/roles/permission', [RolesController::class, 'getRolesPermission']);


Route::post('/permission', [PermissionsController::class, 'getAllPermissions']);
Route::post('/permission/id', [PermissionsController::class, 'getPermissionById']);
Route::post('/permission/where', [PermissionsController::class, 'getPermissionWhere']);
Route::post('/permission/description', [PermissionsController::class, 'getPermissionDescription']);
Route::post('/permission/user', [PermissionsController::class, 'getPermissionUser']);
