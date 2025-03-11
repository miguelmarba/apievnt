<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreAtendeeRequest;
use App\Http\Requests\UpdateAtendeeRequest;
use App\Models\Atendee;

class AtendeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Parametros
        $event_id = $request->input('event_id');
        $seats = $request->input('seats');
        $confirmation = $request->input('confirmation');
        $name = $request->input('name');
        $is_booked = $request->input('is_booked');

        $data = [
            'event_id' => $event_id,
            'seats' => $seats,
            'confirmation' => $confirmation,
            'name' => $name,
            'is_booked' => $is_booked
        ];

        $atendeeSaveResult = (new Atendee)->saveAtendee($data);

        $success = $atendeeSaveResult['success'];
        $message = $atendeeSaveResult['message'];

        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data
        ];

        return response($response, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Atendee $atendee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Atendee $atendee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAtendeeRequest $request, Atendee $atendee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Atendee $atendee)
    {
        //
    }
}
