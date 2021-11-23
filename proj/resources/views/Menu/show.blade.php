@extends('Layouts.app')

@section('content')
 
    <h1>Show {{ $menu->title }}</h1>

    <h3>Opis</h3>
    <p>{{ $menu->content }}</p>

    <h3>Status</h3>
    <p>{{ $menu->onOff ? "ON" : 'OFF' }}</p>
    <a href="/menus/{{ $menu->id }}/edit" class="btn btn-primary">Edit</a>
    <form action="/menus/{{ $menu->id }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        
        <button type="submit" class="btn btn-primary">Delete</button>
        
    </form>
    <form action="/menus/{{ $menu->id }}?mode={{ $menu->onOff ? 'OFF' : 'ON' }}" method="POST" class="d-inline">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-primary">On/Off</button>
    </form>

    <a href="/menus/create" class="btn btn-primary">Add menu item</a>
 
@endsection