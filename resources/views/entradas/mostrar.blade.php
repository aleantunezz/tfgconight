@extends('layouts.app')

@section('content')
<main class="profile-form">
    <h2>Información del Ticket</h2>
    <p>Evento: {{ $ticket->event->name }}</p>
    <p>Cantidad: {{ $ticket->quantity }}</p>
    <p>Precio Total: {{ $ticket->quantity * $ticket->event->price }}</p>
    <!-- Puedes agregar más detalles aquí -->
</main>
@endsection
