<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EduRedController extends Controller
{
    public function index()
    {
        return view('edured.index');
    }

    public function requerimientos()
    {
        return view('edured.requerimientos.index');
    }
}