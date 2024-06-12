<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    public function create(Event $event)
    {
        return view('entradas.comprar', compact('event'));
    }

    public function store(Request $request, Event $event)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $ticket = new Ticket();
        $ticket->event_id = $event->id;
        $ticket->user_id = auth()->id();
        $ticket->quantity = $request->quantity;
        $ticket->qr_code = Str::uuid();  // Generar un valor único para qr_code
        $ticket->save();

        return redirect()->route('tickets.show', ['ticket' => $ticket->id])
                         ->with('success', 'Entradas compradas con éxito.');
    }

    public function show(Ticket $ticket)
    {
        return view('entradas.mostrar', compact('ticket'));
    }
}
