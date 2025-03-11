<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Account extends Model
{
    public function getAll(){
        $accounts = DB::select('CALL sp_acount_getAll()');

        return $accounts;
    }

    public function getById($id){
        $events = DB::select('SELECT * FROM account');

        return $events;
    }

    public function saveAccount($data){
        $saveAccount = DB::select('CALL sp_acount_save(?,?,?,?,?, @account_id)',
        [$data['first_name'], $data['last_name'], $data['email'],
        $data['address'], $data['phone_number']]
        );

        $saveAccountResponse = [
            'success' => true,
            'message' => 'Guardado exitosamente'
        ];

        return $saveAccountResponse;
    }
}
