<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Flower;
use App\Http\Controllers\FlowersController;
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

 

Route::get('/types', function (Request $request) {
    return view('types',[
        "title"=>'Типы'
    ]);
})->name("type");

Route::get('/search', function (Request $request) {

    $objects =Flower::query();
    if($request->query("type")=="Все"){
        $objects =Flower::query();
    }else{
        $objects=$objects->where("type",$request->query("type"));
    }

    $objects=$objects->get();

    return view('search',[
        "title"=>'Поиск', "objects"=> $objects,"typeSelect"=>$request->query("type")
    ]);
});
