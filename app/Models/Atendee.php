<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Atendee extends Model
{
    public function saveAtendee($data){
        $savetendee = DB::select('CALL sp_atendee_save(?,?,?,?,?, @venue_id)',
        [$data['event_id'], $data['seats'], $data['confirmation'],
        $data['name'], $data['is_booked']]
        );

        $saveAtendeeResponse = [
            'success' => true,
            'message' => 'Guardado exitosamente'
        ];

        return $saveAtendeeResponse;
    }
}
