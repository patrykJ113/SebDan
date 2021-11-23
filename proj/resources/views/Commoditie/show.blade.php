@extends('Layouts.app')

@section('content')
    <h1>{{$commoditie->name}}</h1>
    <h3>Opis</h3>
    <p>{{ $commoditie->description }}</p>
    <h3>Cena</h3>
    <p>{{ $commoditie->price }}</p>
    <h3>Status</h3>
    <p>{{ $commoditie->onOff }}</p>

@endsection