<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index() {
        return response()->json([
            'message' => 'Welcome to my first REST API',
        ], 200);
    }
}
