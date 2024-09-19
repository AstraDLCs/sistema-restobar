<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Plato;

class ContenidoPlatos extends Component
{
    use WithPagination;
    public $buscar;
    public $imagen;
    protected $listeners = ['render'];

    public function delete(Plato $plato){
        $plato->delete();
        $this->emit('render');
    }

    public function render()
    {
        $platos = Plato::where('nombre', 'like', '%' . $this->buscar . '%')->get()->reverse();
        return view('livewire.contenido-platos', compact('platos'));
    }
}
