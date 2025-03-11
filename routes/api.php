<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/user', function (Request $request) {
    // return $request->user();
    echo "HOLA MIKE ESTOY EN API";
})->middleware('auth:sanctum');

Route::get('/rol', function (Request $request) {
    // return $request->user();
    echo "HOLA MIKE ESTOY EN API ROL";
});

Route::post('/login', function (Request $request) {
    $user = User::where('email', $request->input('email'))->first();

    if(!$user || Hash::check($request->password, $user->password)){
        return response()->json([
            'message' => 'Credenciales incorrectas',
        ], 401);
    }

    return response()->json([
        'user' => [
            'name' => $user->name,
            'email' => $user->email,
        ],
        'token' => $user->createToken('api')->plainTextToken,
    ]);
});

Route::post('/accounts', [App\Http\Controllers\AccountController::class, 'index']);
Route::post('/accounts/save', [App\Http\Controllers\AccountController::class, 'store']);
Route::post('/checkin', [App\Http\Controllers\CheckInController::class, 'index']);
Route::post('/guest', [App\Http\Controllers\GuestController::class, 'index']);

Route::post('/contacts', [App\Http\Controllers\ContactController::class, 'index']);
Route::post('/contacts/save', [App\Http\Controllers\ContactController::class, 'store']);
Route::post('/venues', [App\Http\Controllers\VenueController::class, 'index']);
Route::post('/venues/save', [App\Http\Controllers\VenueController::class, 'store']);
Route::post('/events', [App\Http\Controllers\EventController::class, 'index']);
Route::post('/events/save', [App\Http\Controllers\EventController::class, 'store']);
Route::post('/atendees', [App\Http\Controllers\AtendeeController::class, 'index']);
Route::post('/atendees/save', [App\Http\Controllers\AtendeeController::class, 'store']);

Route::post('/checkin/save', [App\Http\Controllers\CheckInController::class, 'store']);

Route::any('/', function () {
    return response()->json(['success'=>'false', 'data'=>[], 'message'=>'No existe recurso']);
});