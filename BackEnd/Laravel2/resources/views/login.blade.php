@extends('__layout')

@section('content')<br/>
<form action="" method="post" enctype="multipart/form-data" class="row g-3">
    @csrf
    <div class="row">
        <div class="col-4">
            <label class="form-label">Пользователь</label>
            <input type="text" class="form-control" name="email">
        </div>
    </div>
    <div class="row">
        <div class="col-4">
            <label class="form-label">Пароль</label>
            <input type="text" class="form-control" name="password">
        </div>
    </div>
    <br/>
    <div class="row">
        <div class="col-auto text-end">
            <button type="submit" class="btn btn-primary">Войти</button>
        </div>
    </div>
</form>
@endsection