<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Flower;
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

Route::get('/', function (Request $request) {
    $objects =Flower::query();
    if($request->query("type")){
        $objects=$objects->where("type",$request->query("type"));
    }

    $objects=$objects->get();

    return view('main',[
        "objects"=> $objects,
        "title"=>'Главная страница'
    ]);
})->name("/");
Route::get('/flower/{id}', function (Request $request,$id) {
    
    $object =Flower::query()->where("id",$id)->first();

    return view('object',[
        "object" => $object,
        "title" => $object->title,
        "is_image" => $request->query("show")=="image",
        "is_info" => $request->query("show")=="info"
    ]);
})->name("flower")->whereNumber('id');
 
Route::get('/flower/{id}/edit', function (Request $request,$id) {
    
    $object =Flower::query()->where("id",$id)->first();

    return view('update',[
        "object" => $object,
        "title" => $object->title
    ]);
})->name("flower.edit")->whereNumber('id');


Route::post('/flower/{id}/delete', function (Request $request,$id) {
    
    Flower::destroy($id);
    
    return redirect()->route("/");
})->name("flower.delete")->whereNumber('id');



Route::post('/flower/{id}', function (Request $request,$id) {
    
    $object =Flower::query()->where("id",$id)->first();

    $object->title=$request->input("title");
    $object->description=$request->input("description");
    $object->image=$request->input("image");
    $object->info=$request->input("info");
    $object->type=$request->input("type");
    $object->save();
    return redirect()->route("flower",["id"=>$id]);
})->name("flower.update")->whereNumber('id');

Route::post('/flower', function (Request $request) {
    
    $object =new Flower;

    $object->title=$request->input("title");
    $object->description=$request->input("description");
    $object->image=$request->input("image");
    $object->info=$request->input("info");
    $object->type=$request->input("type");
    $object->save();
    return redirect()->route("/");
})->name("flower.create");


Route::get('/flower/create', function (Request $request) {
    return view('create',[
        "title"=>'Создать цветок'
    ]);
})->name("flower.create_form");