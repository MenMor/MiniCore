@extends('layouts.app')

@section('content')
    <h1>Contratos</h1>
    <form method="get">
        <div class="form-group">
            <label for="fecha_inicio">Fecha inicio:</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
        </div>
        <div class="form-group">
            <label for="fecha_fin">Fecha fin:</label>
            <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
        </div>