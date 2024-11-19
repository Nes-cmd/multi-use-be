<?php

use App\Http\Controllers\TefelagiController;
use App\Models\Tefelagi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('tefelagis', function () {
    return Tefelagi::where('found', false)->get();
});

Route::post('mark-found/{id}', function(Request $request, $id){
    $tefelagi = Tefelagi::findOrFail($id);
    $tefelagi->found = 1;
    $tefelagi->confidence = $request->confidence;
    $tefelagi->supections = $request->image_filename;
    $tefelagi->save();

    return 1;
});

Route::get('get-call-to', [TefelagiController::class, 'tobeCalled']);