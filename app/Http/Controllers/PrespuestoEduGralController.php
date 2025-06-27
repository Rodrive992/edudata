<?php

namespace App\Http\Controllers;

use App\Models\PrespuestoEduGral;
use Illuminate\Http\Request;

class PrespuestoEduGralController extends Controller
{
    public function index(Request $request)
    {
        $query = PrespuestoEduGral::query();

        if ($request->filled('ano')) {
            $query->where('ano', $request->ano);
        }

        if ($request->filled('unidad_ejecutora')) {
            $query->where('unidad_ejecutora', 'like', '%' . $request->unidad_ejecutora . '%');
        }

        if ($request->filled('concepto')) {
            $query->where('concepto', 'like', '%' . $request->concepto . '%');
        }

        $registros = $query->orderBy('ano', 'desc')->paginate(5)->appends($request->all());

        $anios = PrespuestoEduGral::select('ano')->distinct()->orderBy('ano', 'desc')->pluck('ano');

        return view('edudata.presupuesto.index', compact('registros', 'anios'));
    }
}
