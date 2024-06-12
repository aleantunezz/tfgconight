@extends('layouts.app')

@section('content')
<div class="flyers-section">
    <div class="flyer">
        <img src="{{ asset('images/flyer1.jpg') }}" alt="Flyer 1">
    </div>
    <div class="flyer">
        <img src="{{ asset('images/flyer2.jpg') }}" alt="Flyer 2">
    </div>
    <div class="flyer">
        <img src="{{ asset('images/flyer3.jpg') }}" alt="Flyer 3">
    </div>
</div>

<div class="events-section">
    <h2>Nuevos Eventos</h2>

    @if(auth()->user()->role === 'event_creator')
        <div class="add-event-button">
            <a href="{{ route('events.create') }}" class="dashboard-button">Añadir Evento</a>
        </div>
    @endif

    <div class="events-container">
        @foreach($events as $event)
        <div class="event">
            <h3>{{ $event->name }}</h3>
            <p>{{ $event->description }}</p>
            <p>{{ $event->date }}</p>
            <p>{{ $event->price }}</p>
            @if(auth()->user()->role === 'client')
                <a href="{{ route('tickets.create', ['event' => $event->id]) }}" class="dashboard-button">Comprar Entradas</a>
            @elseif(auth()->user()->role === 'event_creator')
                <a href="{{ route('events.edit', ['event' => $event->id]) }}" class="dashboard-button">Editar Evento</a>
            @endif
        </div>
        @endforeach
    </div>
</div>
@endsection
