<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TefelagiController extends Controller
{
    public function tobeCalled()  {
        return response([
            'status' => 1,
            'phone' => '+251940678725',
            'message' => 'Your prospect was found around piassa, for more information.'
        ]);
    }
}
