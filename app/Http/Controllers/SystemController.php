<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemController extends Controller
{

    public function create()
    {
        return view('maintenance_request.create');
    }
}
