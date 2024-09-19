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

    // Reglas de validacion
    protected $rules = [
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefono' => 'required|numeric|digits:9',
        'direccion' => 'required|string|max:255',
        'mensaje' => 'nullable|string|max:255',
    ];

    // Mensajes cuando la validacion no se cumple
    public $messages = [
        'nombre' => 'El campo nombre es obligatorio',
        'email' => 'El campo email es obligatorio',
        'telefono' => 'El campo teléfono debe contener 9 dígitos',
        'direccion' => 'El campo dirección es obligatorio',
        'mensaje' => 'Ha surgido un error en el mensaje',
    ];


    // la funcion mount inicializa los valores de las propiedades del componente, se ejecuta cuando se carga el componente.
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

    // Funcion para guardar los datos del formulario configuraciones
    public function submitForm()
    {
        // Validamos los campos antes de guardar
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
    }

    public function render()
    {
        return view('livewire.contenido-configuraciones');
    }
}
