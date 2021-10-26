<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/permission/id', [PermissionsController::class, 'getPermissionById']);
Route::post('/permission/where', [PermissionsController::class, 'getPermissionWhere']);
Route::post('/permission/description', [PermissionsController::class, 'getPermissionDescription']);
Route::post('/permission/user', [PermissionsController::class, 'getPermissionUser']);
Route::get('/permission', [PermissionsController::class, 'getAllPermissions']);
Route::post('/permission/create', [PermissionsController::class, 'store']);
Route::delete('/permission/delete/{id}', [PermissionsController::class, 'delete']);
Route::put('/permission/update/{id}', [PermissionsController::class, 'update']);


Route::post('/roles/id', [RolesController::class, 'getRollById']);
Route::post('/roles/where', [RolesController::class, 'getRolesWhere']);
Route::post('/roles/description', [RolesController::class, 'getRolesDescription']);
Route::post('/roles/permission', [RolesController::class, 'getRolesPermission']);
Route::get('/roles', [RolesController::class, 'getAllRoles']);
Route::post('/roles/create', [RolesController::class, 'store']);
Route::delete('/roles/delete/{id}', [RolesController::class, 'delete']);
Route::put('/roles/update/{id}', [RolesController::class, 'update']);

Route::post('/users/id', [UsersController::class, 'getUserById']);
Route::post('/users/where', [UsersController::class, 'getUserWhere']);
Route::post('/users/email', [UsersController::class, 'getUserNameEmail']);
Route::post('/users/roll', [UsersController::class, 'getUserRoll']);
Route::get('/users', [UsersController::class, 'getAllUsers']);
Route::get('/users/{id}', [UsersController::class, 'usuarioXpermiso']);
Route::post('/users/create', [UsersController::class, 'store']);
Route::delete('/users/delete/{id}', [UsersController::class, 'delete']);
Route::put('/users/update/{id}', [UsersController::class, 'update']);

