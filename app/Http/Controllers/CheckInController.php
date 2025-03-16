<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CheckIn;

class CheckInController extends Controller
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
            'atendee_id' => ['required', 'numeric'],
            'seats' => ['required', 'numeric'],
            'date' => ['required', 'date_format:Y-m-d H:i']
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
        $atendee_id = $request->input('atendee_id');
        $seats = $request->input('seats');
        $date = $request->input('date');

        $data = [
            'atendee_id' => $atendee_id,
            'seats' => $seats,
            'date' => $date
        ];

        $saveResult = (new CheckIn)->saveCheckIn($data);

        $success = $saveResult['success'];
        $message = $saveResult['message'];

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
