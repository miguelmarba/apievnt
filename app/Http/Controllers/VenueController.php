<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * Show the form for editing the specified resource.
     */
    public function edit(Venue $venue)
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
