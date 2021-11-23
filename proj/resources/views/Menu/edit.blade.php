@extends('Layouts.app')

@section('content')
 
    <form class="row g-3 needs-validation mt-3" novalidate action="/menus/{{$menu->id}}" method="POST">
        @method('PATCH')
        @csrf
       <div class="row">
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Nazwa</label>
            <input type="text" class="form-control" name='title' id="validationCustom01" required value="{{old('title') ?? $menu->title}}">
            <div class="text-danger">{{ $errors->first('title') }}</div>
          </div>
       </div>

       <div class="row">
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">Opis</label>
            <input type="text" class="form-control" name='content' id="validationCustom02" required value="{{old('content') ?? $menu->content }}">
            <div class="text-danger">{{ $errors->first('content') }}</div>
          </div>
       </div>
         
       <div class="row">
        <div class="col-md-3">
            <label for="validationCustom04" class="form-label">Włącz/Wyłącz </label>
            <select class="form-select" id="validationCustom04" required name='onOff'>
              <option selected disabled value=""></option>
              <option value="1" {{ $menu->onOff ? 'selected' : ''}}>Włącz</option>
              <option value="0" {{ !$menu->onOff ? 'selected' : ''}}>Wyłącz</option>
            </select>
            <div class="text-danger">{{ $errors->first('onOff') }}</div>
          </div>
       </div>

        <div class="col-12">
          <button class="btn btn-primary" type="submit">Apply changes</button>
        </div>
    </form>
 
@endsection