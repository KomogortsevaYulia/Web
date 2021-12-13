<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Flower;
use App\Http\Controllers\FlowersController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [FlowersController::Class ,"index"])->name("/");
Route::resource('flowers', FlowersController::Class );
Route::get('/login', [LoginController::Class ,"show"])->name("login");
Route::post('/login', [LoginController::Class ,"login"]);
Route::get('/logout', [LoginController::Class ,"logout"]);

Route::get('/types', function (Request $request) {
    return view('types',[
        "title"=>'Типы'
    ]);
})->name("type");


