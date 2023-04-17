<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratos;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $contratos = Contratos::all();
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        if ($fecha_inicio && $fecha_fin) {
            $contratos = Contratos::whereBetween('fecha', [$fecha_inicio, $fecha_fin])->get();
        }
        return view('contratos.index', compact('contratos'));
    }
}
