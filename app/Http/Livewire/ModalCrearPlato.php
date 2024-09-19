<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use App\Models\Plato;

class ModalCrearPlato extends Component
{
    use WithFileUploads;
    public $open = false;
    public $nombre;
    public $precio;
    public $imagen;

    public function updatingOpen(){
        $this->reset('nombre', 'precio', 'imagen');
        $this->resetValidation();
    }
    protected $rules = [
        "nombre"=> "required|string|max:50",
        "precio"=> "required|numeric",
        'imagen' => 'required|image|max:1024',
    ];

    public $messages = [
        'nombre'=> 'El campo "Nombre" es obligatorio',
        'precio' => 'El campo "Precio" es obligatorio',
        'imagen' => "Es obligatorio subir una Imagen",
    ];

    public function save(){
        $this->validate();
        $plato = new Plato();
        $plato->nombre = $this->nombre;
        $plato->precio = $this->precio;
        if ($this->imagen) {
            $imagePath = $this->imagen->store('images', 'public');
            $plato->imagen = Storage::url($imagePath);
        }
        $plato->save();
        $this->emit('render');
        $this->reset(['open']);
    }
    public function render()
    {
        return view('livewire.modal-crear-plato');
    }
}
