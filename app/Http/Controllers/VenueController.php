<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;
use App\Models\Venue;

class VenueController extends Controller
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
            'name' => ['required'],
            'address' => ['required'],
            'capacity' => ['required', 'numeric'],
            'manager_id' => ['required', 'numeric'],
            'phone_number' => ['required', 'digits_between:10,10'],
            'email' => ['required', 'email'],
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
        $name = $request->input('name');
        $address = $request->input('address');
        $capacity = $request->input('capacity');
        $manager_id = $request->input('manager_id');
        $phone_number = $request->input('phone_number');
        $email = $request->input('email');

        $data = [
            'name' => $name,
            'address' => $address,
            'capacity' => $capacity,
            'manager_id' => $manager_id,
            'phone_number' => $phone_number,
            'email' => $email
        ];

        $venueSaveResult = (new Venue)->saveVenue($data);

        $success = $venueSaveResult['success'];
        $message = $venueSaveResult['message'];

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
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVenueRequest $request, Venue $venue)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Venue $venue)
    {
        //
    }
}
