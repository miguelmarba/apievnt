<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index(Request $request) {
        // try {
            // die("MIKE ok 1");
            // $eventsList = (new Event)->get_events();

            $eventsList = Event::all();


            // var_dump($eventsList);
            // die("MIKE ok");

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
