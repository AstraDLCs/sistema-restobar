<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Configuracion;

class ContenidoConfiguraciones extends Component
{
    public $nombre;
    public $email;
    public $telefono;
    public $direccion;
    public $mensaje;

    protected $rules = [
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefono' => 'required|numeric',
        'direccion' => 'required|string|max:255',
        'mensaje' => 'required|string',
    ];

    public function mount()
    {
        $configuracion = Configuracion::firstOrCreate();
        $this->nombre = $configuracion->nombre;
        $this->email = $configuracion->email;
        $this->telefono = $configuracion->telefono;
        $this->direccion = $configuracion->direccion;
        $this->mensaje = $configuracion->mensaje;
    }

    public function resetForm()
    {
        $this->mount();
    }
    public function submitForm()
    {
        $this->validate();

        Configuracion::updateOrCreate(
            [], // Condiciones de búsqueda (vacío porque solo tenemos un registro)
            [
                'nombre' => $this->nombre,
                'email' => $this->email,
                'telefono' => $this->telefono,
                'direccion' => $this->direccion,
                'mensaje' => $this->mensaje,
            ]
        );

        session()->flash('message', 'Configuración actualizada con éxito.');
    }

    public function render()
    {
        return view('livewire.contenido-configuraciones');
    }
}
