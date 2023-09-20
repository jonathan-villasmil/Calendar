<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventTypeRequest;
use App\Http\Requests\UpdateEventTypeRequest;
use App\Models\EventType;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Exists;

class EventTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $event_types = EventType::all();
        return view('admin.event_type.index', compact('event_types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event_type.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventTypeRequest $request)
    {   
        
        // Validar los datos ingresados por el usuario
        $event_type = $request->validated();
       
        // Crear una nueva instancia del modelo EventType y asignar los valores del formulario
        $event_type = EventType::create($event_type);

        // Redirigir a la vista de lista de tipos de eventos con un mensaje de éxito
        return redirect()->route('admin.event-types.index')->with('message','Event type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(EventType $eventType)
    {
        return view('admin.event_type.show', compact('eventType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventType $eventType)
    {
        return view('admin.event_type.edit', compact('eventType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventTypeRequest $request, EventType $eventType)
    {
        // Validar los datos ingresados por el usuario
        $eventTypeData = $request->validated();
        //dd($eventTypeData);
        // Guardar los cambios en el tipo de evento
        $eventType->update($eventTypeData);

        // Redirigir a la vista de lista de tipos de eventos con un mensaje de éxito
        return redirect()->route('admin.event-types.index')->with('message', 'Event type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventType $eventType)
    {
        if ($eventType) {
            $eventType->delete();
            return redirect()->route('admin.event-types.index')->with('message', 'Event type deleted successfully.');
        } else {
            return redirect()->route('admin.event-types.index')->with('message', 'Event type does not exist or has already been deleted.');
        }
    }
}
