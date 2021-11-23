@extends('Layouts.app')

@section('content')

<h1>Edit commoditie</h1>

<form class="row g-3 needs-validation" novalidate action="/commodities/{{$commoditie->id}}" method="POST">
    @method('PATCH')
    @csrf
    <div class="col-md-4">
      <label for="validationCustom01" class="form-label">Nazwa</label>
      <input type="text" class="form-control" name='name' id="validationCustom01" required value="{{old('name') ?? $commoditie->name}}">
      <div class="text-danger">{{ $errors->first('name') }}</div>
    </div>
    <div class="col-md-4">
      <label for="validationCustom02" class="form-label">Opis</label>
      <input type="text" class="form-control" name='description' id="validationCustom02" required value="{{old('description') ?? $commoditie->description}}">
      <div class="text-danger">{{ $errors->first('description') }}</div>
    </div>
   <div class="row">
    <div class="col-md-4">
        <label for="validationCustom02" class="form-label">Cena</label>
        <input type="number" class="form-control" name='price' id="validationCustom02" required value="{{old('price') ?? $commoditie->price}}">
        <div class="text-danger">{{ $errors->first('price') }}</div>
      </div>
  
      <div class="col-md-3">
        <label for="validationCustom04" class="form-label">Włącz/Wyłącz </label>
        <select class="form-select" id="validationCustom04" required name='onOff'>
          <option selected disabled value=""></option>
          <option value="1" {{ $commoditie->onOff ? 'selected' : ''}}>Włącz</option>
          <option value="0" {{ !$commoditie->onOff ? 'selected' : ''}}>Wyłącz</option>
        </select>
        <div class="text-danger">{{ $errors->first('onOff') }}</div>
      </div>
   </div>
    <div class="col-12">
      <button class="btn btn-primary" type="submit">Apply changes</button>
    </div>
  </form>

@endsection