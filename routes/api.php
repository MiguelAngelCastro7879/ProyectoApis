<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RolesController;

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


Route::post('/users', [UsersController::class, 'getAllUsers']);
Route::post('/users/id', [UsersController::class, 'getUserById']);
Route::post('/users/where', [UsersController::class, 'getUserWhere']);
Route::post('/users/email', [UsersController::class, 'getUserNameEmail']);
Route::post('/users/roll', [UsersController::class, 'getUserRoll']);



Route::post('/roles', [RolesController::class, 'getAllRoles']);
Route::post('/roles/id', [RolesController::class, 'getRollById']);
Route::post('/roles/where', [RolesController::class, 'getRolesWhere']);
Route::post('/roles/description', [RolesController::class, 'getRolesNameEmail']);
Route::post('/roles/Permission', [RolesController::class, 'getRolesPermission']);
