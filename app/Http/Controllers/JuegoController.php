<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\http;


class JuegoController extends Controller
{

<<<<<<< HEAD
    private string $ipPermitida = 'https://azariah-unbrittle-gwen.ngrok-free.dev';
=======
    private string $ipPermitida = 'https://roni-promodernistic-depreciatingly.ngrok-free.dev';
>>>>>>> bafffe825d326e44ec8a0f02b2d3f28b15529d20

    public function paparecibida(Request $request)
    {
        try {
            $num_paparecibida = $request->input('numero', 0);
            $mi_num = $num_paparecibida + 1;

            DB::table('game_state')->updateOrInsert(
                ['id' => 1],
                [
                    'numero' => $mi_num,
                    'num_max' => $mi_num,
                    'ultmia_ip' => $request->ip(),
                    'updated_at' => now(),
                ]
            );

            $this->enviarpapa($mi_num);
            return response()->json([
                'status' => 'success',
                'received_number' => $num_paparecibida,
                'mensaje' => 'Papa recibida y procesada',
                'mi_numero' => $mi_num
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error al procesar la papa: ' . $e->getMessage()
            ], 500);
        }
    }

    public function enviarpapa(int $numero)
    {
        try {
<<<<<<< HEAD
            $response = Http::timeout(10)->post($this->ipPermitida, [
=======
            $response = Http::timeout(5)->poat($this->ipPermitida, [
>>>>>>> bafffe825d326e44ec8a0f02b2d3f28b15529d20
                'numero' => $numero
            ]);

            if ($response->successful()) {
                return true;
            } else {
                throw new \Exception('Error en la respuesta del server: ' . $response->body());
            }
        } catch (\Exception $e) {
            throw new \Exception('Error al enviar la papa: ' . $e->getMessage());
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
<<<<<<< HEAD
            'laptop'=> 3,
=======
            'laptop'=> 1,
>>>>>>> bafffe825d326e44ec8a0f02b2d3f28b15529d20
            'numero_actual' => $estado->numero ?? 0,
            'numero_maximo' => $estado->num_max ?? 0,
            'updated_at' => $estado->updated_at ?? null,
        ]);
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> bafffe825d326e44ec8a0f02b2d3f28b15529d20
