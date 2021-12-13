@extends('__layout')

@section('content')
<div class="row d-flex">
    @foreach ($types as $type)
        <div class="col mb-4 align-items-stretch">
            <div class="border p-2 d-flex flex-column justify-content-between">
                <div class="img-thumbnail mb-2" style="width:100%;height:300px;overflow:hidden;">
                    <img src="{{$type->image}}" style="width:100%;height:100%;object-fit:cover;" alt="">
                </div>
                <div class="d-flex flex-column">
                    <a class="btn btn-primary mb-1" href="/types">{{$type->name}}</a>
                </div>
           </div>  
        </div>
    @endforeach
</div>
@endsection