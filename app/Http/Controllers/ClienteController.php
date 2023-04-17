<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function index()
    {
        return view('cliente');
    }
 
    public function records(Request $request)
    {
        if ($request->ajax()) {
 
            if ($request->input('start_date') && $request->input('end_date')) {
 
                $start_date = Carbon::parse($request->input('start_date'));
                $end_date = Carbon::parse($request->input('end_date'));
 
                if ($end_date->greaterThan($start_date)) {
                    $cliente = Cliente::whereBetween('created_at', [$start_date, $end_date])->get();
                } else {
                    $cliente = Cliente::latest()->get();
                }
            } else {
                $cliente = Cliente::latest()->get();
            }
 
            return response()->json([
                'cliente' => $cliente
            ]);
        } else {
            abort(403);
        }
    }
}
