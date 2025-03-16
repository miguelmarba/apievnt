<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones
        $rules = [
            'event_id' => ['required', 'numeric'],
            'seats' => ['required', 'numeric'],
            'confirmation' => ['required', 'boolean'],
            'name' => ['required'],
        ];

        $validatedData = Validator::make($request->all(), $rules);

        if($validatedData->fails()){
            $response = [
                'success' => false,
                'message' => 'Hay errores en los parámetros.',
                'data' => $validatedData->messages()
            ];
            return response($response, 200);
        }

        // Parametros
        $event_id = $request->input('event_id');
        $seats = $request->input('seats');
        $confirmation = $request->input('confirmation');
        $name = $request->input('name');
        $is_booked = $request->input('is_booked', false);

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
