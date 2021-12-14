<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Flower;

class FlowersController extends Controller
{
    function __construct(){
        $this->middleware("auth",["except"=>["index","show"]]);
        
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $objects =Flower::query();
        if($request->query("type")){
            $objects=$objects->where("type",$request->query("type"));
        }
    
        $objects=$objects->get();
    
        return view('main',[
            "objects"=> $objects,
            "title"=>'Главная страница'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create',[
            "title"=>'Создать цветок'
        ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $object =new Flower;

        $object->title=$request->input("title");
        $object->description=$request->input("description");
        $object->image=$request->input("image");
        $object->info=$request->input("info");
        $object->type=$request->input("type");
        $object->save();
        return redirect()->route("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $object =Flower::query()->where("id",$id)->first();

        return view('object',[
        "object" => $object,
        "title" => $object->title,
        "is_image" => $request->query("show")=="image",
        "is_info" => $request->query("show")=="info"
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object =Flower::query()->where("id",$id)->first();
        1231231242131
        return view('update',[
            "object" => $object,
            "title" => $object->title
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $object =Flower::query()->where("id",$id)->first();

        $object->title=$request->input("title");
        $object->description=$request->input("description");
        $object->image=$request->input("image");
        $object->info=$request->input("info");
        $object->type=$request->input("type");
        $object->save();
        return redirect()->route("flowers.show",["flower"=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Flower::destroy($id);
        return redirect()->route("/");
    }
}
