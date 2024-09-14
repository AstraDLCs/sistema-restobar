<?php

namespace App\Http\Livewire;
use App\Models\Plato;
use App\Models\Sala;
use App\Models\User;
use App\Models\Pedido;
use Livewire\Component;

class ContenidoDashboard extends Component
{

    public function render()
    {
        $cantidadUsuarios = User::all()->count();
        $cantidadSalas = Sala::all()->count();
        $cantidadPlatos = Plato::all()->count();
        $cantidadPedidos = Pedido::where('estado', 1)->count();
        
        return view('livewire.contenido-dashboard', compact('cantidadPlatos', 'cantidadSalas', 'cantidadUsuarios', 'cantidadPedidos'));
    }
}
