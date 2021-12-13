@extends('__layout')

@section('content')
  <h1>{{ $object->title }}</h1>
<p>{{ $object->description}}</p>
  <ul class="nav nav-pills">
    <li class="nav-item">
     
      <a href="/flowers/{{$object->id}} ?show=image" @class(["btn","me-2","btn-primary "=>$is_image,"btn-link"=>!$is_image]) >Картинка</a>
      </li>
    <li class="nav-item ">
      <a href="/flowers/{{$object->id}} ?show=info" @class(["btn","me-2","btn-primary "=>$is_info,"btn-link"=>!$is_info])>Описание</a>
      
    </li>
  </ul>
  
  <div class="mt-2">
    <ul class="list-group">
      <li class="list-group-item">
      @if($is_image)
        <img src="{{ $object->image }}" style="width: 300px;"/>
      @elseif($is_info)
        {{ $object->info }}
      @else
        Выбирайте что хотите смотреть
      @endif
  </li>
    </ul>
  </div>
@endsection