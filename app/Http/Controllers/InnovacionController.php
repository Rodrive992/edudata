<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InnovacionController extends Controller
{
    public function index(Request $request)
    {       

        return view('edudata.innovacion.index');
    }
}
