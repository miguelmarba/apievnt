<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    public function saveVenue($data){
        $saveVenue = DB::select('CALL sp_venue_save(?,?,?,?,?,?, @venue_id)',
        [$data['name'], $data['address'], $data['capacity'],
        $data['manager_id'], $data['phone_number'], $data['email']]
        );

        $saveVenueResponse = [
            'success' => true,
            'message' => 'Guardado exitosamente'
        ];

        return $saveVenueResponse;
    }
}
