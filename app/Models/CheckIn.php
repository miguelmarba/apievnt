<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    public function saveCheckIn($data){
        $savetendee = DB::select('CALL sp_checkin_save(?,?,?,@checkin_id)',
        [$data['atendee_id'], $data['seats'], $data['date']]
        );

        $saveResponse = [
            'success' => true,
            'message' => 'Guardado exitosamente'
        ];

        return $saveResponse;
    }
}

