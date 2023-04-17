<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contratos;

class ContratosController extends Controller
{
    public function index()
    {
        $contratos = Contratos::with('cliente')->get();
        return view('contratos', compact('contratos'));
    }
    
    public function filtrar(Request $request)
    {
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        
        $contratos = Contratos::whereBetween('fecha', [$fecha_inicio, $fecha_fin])->with('cliente')->get();
        
        
        return view('contratos', compact('contratos'));
    }
}
