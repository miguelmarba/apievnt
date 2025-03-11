<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
