<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegoController;

<<<<<<< HEAD
Route::post('/paparecibida', [JuegoController::class, 'paparecibida'])
    ->middleware(['verificar.ip', 'delay.game']);

Route::post('/iniciarjogo', [JuegoController::class, 'empezarjuego']);
Route::get('checarStatus', [JuegoController::class, 'checarestado']);
=======
Route::post('/papareicbida', [JuegoController::class, 'paparecibida'])
    ->middleware(['verificar.ip', 'delay.game']);

Route::post('/iniciarjogo', [juegoController::class, 'empezarjuego']);
Route::get('checarStatus', [JuegoController::class, 'checarestado']);
>>>>>>> bafffe825d326e44ec8a0f02b2d3f28b15529d20
