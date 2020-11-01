<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/crud', [StudentController::class, 'index']);
Route::post('/crud/store', [StudentController::class, 'store']);
Route::get('/crud/edit/{id}', [StudentController::class, 'edit']);
Route::post('/crud/update/{id}', [StudentController::class, 'update']);
Route::get('/crud/delete/{id}', [StudentController::class, 'delete']);
