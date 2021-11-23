@extends('Layouts.app')

@section('content')

<h1>Add Commoditie</h1>

<form class="row g-3 container" action="/commodities" method="POST">
  @csrf
    <div class="col-md-3">
      <label for="inputEmail4" class="form-label">Nazwa</label>
      <input type="text" class="form-control" id="inputEmail4"  name="name" value="{{ old('name') }}">
      <div class="text-danger">{{ $errors->first('name') }}</div>
    </div>
    <div class="col-md-3">
      <label for="inputPassword4" class="form-label" >Opis</label>
      <input type="text" class="form-control" id="inputPassword4" name='description' value={{ old('description') }}>
      <div class="text-danger">{{ $errors->first('description') }}</div>
    </div>
   <div class="row">
    <div class="col-3">
      <label for="inputAddress" class="form-label" >Cena</label>
      <input type="number" class="form-control" id="inputAddress" name='price' value={{old('price')}}>
      <div class="text-danger">{{ $errors->first('price') }}</div>
    </div>
    <div class="col-md-3">
      <label for="inputState" class="form-label" >	Włącz wyłącz</label>
      <select id="inputState" class="form-select" name='onOff' >
        <option selected disabled value=""></option>
          <option value="1" >Włącz</option>
          <option value="0 " >Wyłącz</option>
      </select>
      <div class="text-danger">{{ $errors->first('onOff') }}</div>
    </div>
   </div>
    <div class="col-12">
      <button type="submit" class="btn btn-primary">Add</button>
    </div>
  </form>
@endsection