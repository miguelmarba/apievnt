<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function saveContact($data){
        $saveContact = DB::select('CALL sp_contact_save(?,?,?,?,?, @contact_id)',
        [$data['first_name'], $data['last_name'], $data['email'],
        $data['address'], $data['phone_number']]
        );

        $saveContactResponse = [
            'success' => true,
            'message' => 'Guardado exitosamente'
        ];

        return $saveContactResponse;
    }
}
