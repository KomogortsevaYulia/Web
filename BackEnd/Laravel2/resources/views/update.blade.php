@extends('__layout')

@section('content')
<h1>Редактирование цветочка</h1>
    <hr>
    <form action="{{route("flowers.update",["flower" =>$object->id ])}}" method="post" enctype="multipart/form-data" class="row g-3">
        @csrf
        @method("put")
        <div class="col-4">
            <label class="form-label">Название</label>
            <input type="text" class="form-control" value="{{$object->title}}" name="title">
        </div>
        <div class="col-4">
            <label class="form-label">Краткое описание</label>
            <input type="text" class="form-control" value="{{$object->description}}"  name="description">
        </div>
        <div class="col-4">
            <label class="form-label">Тип</label>
            <select class="form-control" name="type">
                @foreach ($types as $type)
                    @if($type->id == $object->type)
                        <option value="{{$type->id}}" selected>{{$type->name}}</option>
                    @else
                    <option value="{{$type->id}}">{{$type->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-3"> 
            <img src="{{$object->image}}" style="width: 300px;"/>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label">Картинка</label>
            <textarea class="form-control" rows="5" name="image">{{$object->image}}</textarea>
          </div>
        <div class="col-12">
            <textarea name="info" placeholder="Полное описание..." class="form-control" rows="10">{{$object->info}}</textarea>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Изменить</button>
        </div>
        
    </form>
@endsection