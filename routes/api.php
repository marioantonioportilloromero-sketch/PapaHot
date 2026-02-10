<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PapaController;

Route::post('/paparecibida', [PapaController::class, 'NumeroRecibido'])
    ->middleware(['verificar.ip', 'delay.game']);

Route::post('/iniciarjogo', [PapaController::class, 'empezarjuego']);

Route::get('/checarStatus', [PapaController::class, 'checarestado']);
