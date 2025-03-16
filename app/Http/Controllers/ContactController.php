<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;

class ContactController extends Controller
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'address' => ['required'],
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
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $address = $request->input('address');
        $phone_number = $request->input('phone_number');
        $email = $request->input('email');

        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'address' => $address,
            'phone_number' => $phone_number,
            'email' => $email
        ];

        $contactSaveResult = (new Contact)->saveContact($data);

        $success = $contactSaveResult['success'];
        $message = $contactSaveResult['message'];

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
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
