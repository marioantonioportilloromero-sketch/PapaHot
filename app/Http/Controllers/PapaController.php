<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\http;

class PapaController extends Controller
{
    private string $ipPermitida = 'https://azariah-unbrittle-gwen.ngrok-free.dev/api/paparecibida';

    public function NumeroRecibido(Request $request)
    {
        try {
            $num_recibido = $request->input('numero', 0);
            $mi_numero = $num_recibido + 1;

            DB::table('game_state')->updateOrInsert(
                ['id' => 1],
                [
                    'numero' => $mi_numero,
                    'num_max' => $mi_numero,
                    'ultmia_ip' => $request->ip(),
                    'updated_at' => now(),
                ]
            );

            $this->EnviarNumero($mi_numero);
            return response()->json([
                'status' => 'success',
                'received_number' => $num_recibido,
                'mensaje' => 'Papa recibida y procesada.',
                'mi_numero' => $mi_numero
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al procesar la papa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function EnviarNumero(int $numero)
    {
        try {
            $response = Http::timeout(5)->post($this->ipPermitida, [
                'numero' => $numero
            ]);

            if ($response->successful()) {
                return true;
            } else {
                throw new \Exception('Error en la respuesta del servidor remoto: ' . $response->body());
            }
        } catch (\Exception $e) {
            throw new \Exception('Error al enviar el numero: ' . $e->getMessage());
        }
    }

    public function empezarjuego()
    {
        try {
            DB::table('game_state')->updateOrInsert(
                ['id' => 1],
                [
                    'numero' => 1,
                    'num_max' => 1,
                    'ultmia_ip' => null,
                    'updated_at' => now(),
                ]
            );

            $this->enviarpapa(1);
            return response()->json([
                'status' => 'success',
                'mensaje' => 'Juego iniciado y papa inicial enviada.'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al iniciar el juego: ' . $e->getMessage()
            ], 500);
        }
    }


    public function checarestado()
    {

        $estado = DB::table('game_state')->find(1);

        return response()->json([
            'laptop'=> 1,
            'numero_actual' => $estado->numero ?? 0,
            'numero_maximo' => $estado->num_max ?? 0,
            'updated_at' => $estado->updated_at ?? null,
        ]);
    }
}
