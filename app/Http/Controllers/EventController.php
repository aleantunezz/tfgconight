<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('index', compact('events'));
    }

    public function dashboard()
    {
        $events = Event::where('date', '>=', now())->orderBy('date', 'asc')->get();
        return view('dashboard', compact('events'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'available_tickets' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $event = new Event($request->all());
        $event->user_id = auth()->id();
        $event->save();

        return redirect()->route('dashboard')->with('success', 'Evento creado con éxito.');
    }

    public function edit(Event $event)
    {
        // Convertir la fecha a una instancia de Carbon
        $event->date = Carbon::parse($event->date);

        return view('eventos.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required|date',
            'available_tickets' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $event->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Evento actualizado con éxito.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('dashboard')->with('success', 'Evento eliminado con éxito.');
    }
}


