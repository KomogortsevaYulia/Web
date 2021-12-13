@extends('__layout')

@section('content')
<div class="row d-flex">
    @foreach($objects as $object)
    <div class="col-4 mb-6 align-items-stretch">
        <div class="border p-2 d-flex flex-column justify-content-between position-relative">
            <div class="position-absolute" style="right:4px;top:4px">
               
                <form method="post" action="{{route("flower.delete",$object->id)}}">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times"></i>
                    </button>
                </form>
            </div>
            <div class="position-absolute" style="right:4px;top:35px">
                <form method="get" action="{{route("flower.edit",$object->id)}}">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                </form>
            </div>
        <div class="img-thumbnail mb-2" style="width:100%;height:300px;overflow:hidden;">
            <img src=" {{$object->image}}" style="width:100%;height:100%;object-fit:cover;" alt="">
        </div>
        <div class="d-flex flex-column">
            <a class="btn btn-primary mb-1" href="{{route("flower",$object->id)}}"> {{$object->title}}</a>
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
