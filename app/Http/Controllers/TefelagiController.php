<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TefelagiController extends Controller
{
    public function tobeCalled()  {
        Log::info('was hited');
        return response([
            'status' => 1,
            'phone' => '+251940678725',
            'message' => 'Your prospect was found around piassa, for more information.'
        ]);
    }
}
