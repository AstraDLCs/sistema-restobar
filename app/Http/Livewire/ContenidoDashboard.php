<?php

namespace App\Http\Livewire;

use App\Models\Plato;
use App\Models\Sala;
use App\Models\User;
use App\Models\Pedido;
use Livewire\Component;
use Carbon\Carbon;


class ContenidoDashboard extends Component
{
    public function render()
    {
        Carbon::setLocale('es');

        // obtiene los ultimos 7 dias
        $dias = collect();
        for ($i = 6; $i >= 0; $i--) {
            $dias->push(Carbon::now()->subDays($i)->format('Y-m-d'));
        }

        // suma las ganancias para cada dia y las retorna en una coleccion
        $chartGanancia = $dias->map(function ($dia) {
            $ganancia = Pedido::whereDate('created_at', $dia)
                ->where('estado', 1) 
                ->sum('total');

        // le damos un formato a la fecha mostrada: dia - numero del dia
            return [
                'fecha' => Carbon::parse($dia)->translatedFormat('l d'),
                'ganancia' => $ganancia
            ];
        });

        // consultas para las tarjetas del dashboard
        $cantidadUsuarios = User::all()->count();
        $cantidadSalas = Sala::all()->count();
        $cantidadPlatos = Plato::all()->count();
        $cantidadPedidos = Pedido::where('estado', 1)->count();

        // aqui retornamos las variables a la vista usando compact
        return view('livewire.contenido-dashboard', compact('cantidadPlatos', 'cantidadSalas', 'cantidadUsuarios', 'cantidadPedidos', 'chartGanancia'));
    }
}
