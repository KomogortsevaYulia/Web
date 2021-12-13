@extends('__layout')

@section('content')
<form action="">
    <div class="row">
        <div class="col-auto"> 
            <label>Поиск</label>
            <select class="form-select" name="type">
                <option value="Все" selected>Все</option>
                @foreach ($types as $type)
                    @if($type->id == $typeSelect)
                    <option value="{{$type->id}}" selected>{{$type->name}}</option>
                    @else
                    <option value="{{$type->id}}">{{$type->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="col-auto">
            <label>Название</label>
            <input type="text" name="title" class="form-control" placeholder="Название">
        </div>
        <div class="col-auto">
            <label>Описание</label>
            <input type="text" name="info" class="form-control" placeholder="Описание">
        </div>
        <div class="col-auto">
            <br/>
            <button type="submit" class="btn btn-primary">Найти</button>
        </div>
    </div>
</form>
<div class="row d-flex">
    @foreach($objects as $object)
    <div class="col-4 mb-6 align-items-stretch">
        <div class="border p-2 d-flex flex-column justify-content-between position-relative">
        <div class="img-thumbnail mb-2" style="width:100%;height:300px;overflow:hidden;">
            <img src=" {{$object->image}}" style="width:100%;height:100%;object-fit:cover;" alt="">
        </div>
        <div class="d-flex flex-column">
            <a class="btn btn-primary mb-1" href="{{route("flowers.show",$object->id)}}"> {{$object->title}}</a>
            <div class="d-flex justify-content-center">
                <a class="me-3" href="/flower/{{$object->id}} ?show=image">Картинка</a>
                <a href="/flower/{{$object->id}} ?show=info">Описание</a>
            </div>
        </div>
        </div>  
    </div>
    @endforeach
</div>
@endsection