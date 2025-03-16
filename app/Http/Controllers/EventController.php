<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request) {
        // try {
            // $eventsList = (new Event)->get_events();

            $eventsList = Event::all();

            // return response()->json($eventsLis, 200);
            return response()->json(['success'=>'true', 'data'=>$eventsList, 'message'=>'Resultado exitoso']);
            // return ['success'=>'true', 'data'=>[], 'message'=>'Resultado exitoso desde el controller'];
            //code...
        // } catch (\Exception $e) {
        //     die("Error SQL: " . $e->getMessage());
        // }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validaciones
        $rules = [
            'title' => ['required'],
            'start_date' => ['required', 'date_format:Y-m-d H:i'],
            'end_date' => ['required', 'date_format:Y-m-d H:i'],
            'capacity' => ['required', 'numeric'],
            'customer_id' => ['required', 'numeric'],
            'additional_info' => ['required'],
            'venue_id' => ['required', 'numeric'],
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
        $title = $request->input('title');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        $capacity = $request->input('capacity');
        $customer_id = $request->input('customer_id');
        $additional_info = $request->input('additional_info');
        $venue_id = $request->input('venue_id');

        $data = [
            'title' => $title,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'capacity' => $capacity,
            'customer_id' => $customer_id,
            'additional_info' => $additional_info,
            'venue_id' => $venue_id
        ];

        $eventSaveResult = (new Event)->saveEvent($data);

        $success = $eventSaveResult['success'];
        $message = $eventSaveResult['message'];

        $response = [
            'success' => $success,
            'message' => $message,
            'data' => $data
        ];

        return response($response, 200);
    }

}
