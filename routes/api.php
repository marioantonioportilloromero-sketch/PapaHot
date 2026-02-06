<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PapaController;

Route::post('/papareicbida', [PapaController::class, 'paparecibida'])
    ->middleware(['verificar.ip', 'delay.game']);

Route::post('/iniciarjuego', [juegoController::class, 'empezarjuego']);
Route::get('checarStatus', [JuegoController::class, 'checarestado']);
