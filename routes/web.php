<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Products;
use App\Http\Controllers\ContratosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('contratos', [ContratosController::class, 'index'])->name('contratos.index');
    Route::post('/contratos/filtrar', [ContratosController::class, 'filtrar'])->name('contratos.filtrar');

    Route::get('/products', Products::class);
    Route::get('/dashboard', function(){
        return view('dashboard');
    })->name('dashboard');   
});
