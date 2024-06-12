@extends('layouts.app')

@section('content')
<main class="profile-form">
    <h2>Comprar Entradas para {{ $event->name }}</h2>
    <p>Fecha: {{ $event->date }}</p>
    <h1>Precio: {{ $event->price }}</h1>
    <form action="{{ route('tickets.store', ['event' => $event->id]) }}" method="post">
        @csrf
        <label for="quantity">Cantidad de Entradas</label>
        <input type="number" id="quantity" name="quantity" required>
        <button type="submit">Comprar</button>
    </form>
</main>
@endsection
