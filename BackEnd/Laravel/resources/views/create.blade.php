@extends('__layout')

@section('content')
<h1>Создание цветочка</h1>
    <hr>
    <form action="{{route("flower.create")}}" method="post" enctype="multipart/form-data" class="row g-3">
        @csrf
        <div class="col-4">
            <label class="form-label">Название</label>
            <input type="text" class="form-control"  name="title">
        </div>
        <div class="col-4">
            <label class="form-label">Краткое описание</label>
            <input type="text" class="form-control"  name="description">
        </div>
        <div class="col-4">
            <label class="form-label">Тип</label>
            <select class="form-control" name="type">
                @foreach ($types as $type)
                    <option value="{{$type->id}}" >{{$type->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-3 mb-3">
            <label class="form-label">Картинка</label>
            <textarea class="form-control" rows="5" name="image"></textarea>
          </div>
        <div class="col-12">
            <textarea name="info" placeholder="Полное описание..." class="form-control" rows="10"></textarea>
        </div>
        <div class="col-12 text-end">
            <button type="submit" class="btn btn-primary">Создать</button>
        </div>
        
    </form>
@endsection