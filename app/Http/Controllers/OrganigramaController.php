<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganigramaController extends Controller
{
    public function index(Request $request)
    {       

        return view('edudata.organigrama.index');
    }
}
