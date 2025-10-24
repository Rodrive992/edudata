<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CargoEducacion;

class SolicitudCargoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $cargos = CargoEducacion::where('cue', $user->cue)
            ->orderBy('cargo')
            ->get();

        return view('edured.herramientas.solicitudcargos.index', compact('user', 'cargos'));
    }

    // Vista para generar la solicitud a partir de un cargo
    public function generar($cargoId)
    {
        $user = Auth::user();
        $cargo = CargoEducacion::findOrFail($cargoId);

        // Seguridad: que el cargo pertenezca al CUE del usuario
        abort_unless((string)$cargo->cue === (string)$user->cue, 403, 'No autorizado.');

        return view('edured.herramientas.solicitudcargos.generar_solicitud', compact('user', 'cargo'));
    }
}