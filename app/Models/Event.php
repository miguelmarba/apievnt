<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'rol';
    protected $primaryKey = 'id';

    public function get_events(){
        $events = DB::select('SELECT * FROM rol');
        // $events = ["eventos" => 0];

        return $events;
    }

    public function saveEvent($data){
        $saveEvent = DB::select('CALL sp_event_save(?,?,?,?,?,?,?, @venue_id)',
        [$data['title'], $data['start_date'], $data['end_date'],
        $data['capacity'], $data['customer_id'], $data['additional_info'], $data['venue_id']]
        );

        $saveEventResponse = [
            'success' => true,
            'message' => 'Guardado exitosamente'
        ];

        return $saveEventResponse;
    }
}
