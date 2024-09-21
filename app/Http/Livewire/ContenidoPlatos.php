<?php

namespace App\Http\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Plato;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ContenidoPlatos extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $listeners = ['render'];
    public $buscar;
    public $imagen;
    public $openModalEditarPlato = false;
    public $nombreEditarPlato;
    public $precioEditarPlato;
    public $imagenEditarPlato;
    public $idEditarPlato;

    protected $rules = [
        "nombreEditarPlato" => "required|string|max:50",
        "precioEditarPlato" => ["required", "numeric", "regex:/^\d+(\.\d{1,2})?$/"],
    ];
    public $messages = [
        'nombreEditarPlato' => 'El campo "Nombre" es obligatorio',
        'precioEditarPlato' => 'El campo "Precio" esta vacio o tiene mas de 2 decimales',
    ];

    public function updatedOpenModalEditarPlato()
    {
        $this->reset(['nombreEditarPlato', 'precioEditarPlato', 'imagenEditarPlato']);
        $this->resetValidation();
    }
    public function modalEditarPlato(Plato $plato)
    {
        $this->openModalEditarPlato = true;
        $this->idEditarPlato = $plato->id;
        $this->nombreEditarPlato = $plato->nombre;
        $this->precioEditarPlato = $plato->precio;
        $this->imagenEditarPlato = $plato->imagen;
    }
    public function actualizarPlatos()
    {
        // validamos los datos
        $this->validate();

        // buscamos el plato a editar
        $plato = Plato::find($this->idEditarPlato);

        // si la imagen es diferente a la que ya tenia, la eliminamos y actualizamos la nueva
        if ($this->imagenEditarPlato != $plato->imagen) {
            Storage::delete($plato->imagen);
            if ($this->imagenEditarPlato instanceof UploadedFile) {
                $imagen = $this->imagenEditarPlato->store('public/platos');
                $imagen = Storage::url($imagen);
                $plato->update([
                    'imagen' => $imagen,
                ]);
            }
        }

        // actualizamos los datos del plato
        $plato->update([
            'nombre' => $this->nombreEditarPlato,
            'precio' => $this->precioEditarPlato,
        ]);

        // cerramos el modal y renderizamos denuevo la pagina
        $this->openModalEditarPlato = false;
        $this->emit('render');
    }

    // funcion para eliminar un plato
    public function delete(Plato $plato)
    {
        Storage::delete($plato->imagen);
        $plato->delete();
        $this->emit('render');
    }

    public function render()
    {
        $platos = Plato::where('nombre', 'like', '%' . $this->buscar . '%')->get()->reverse();
        return view('livewire.contenido-platos', compact('platos'));
    }
}
