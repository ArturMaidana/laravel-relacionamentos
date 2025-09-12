<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithPagination;


class ShowCategorias extends Component
{

    use WithPagination;

    public $name = 'Alimento';

    public $status = '';

    public $categoriaId;

    // protected $rules = [
    //     'name' => 'required|min:3|max:255',
    //     'status' => 'required|in:1,0',
    // ];


    protected $message = [
        'status.required' => 'Selecione um status antes de continuar.',
        'status.in' => 'Selecione uma opção válida.',
    ];


    public function render()
    {
        $categorias = Categoria::latest()->paginate(10);
        return view('livewire.show-categorias', ['categorias' => $categorias]);
    }


    public function create(Categoria $categoria){

         $this->validate([
            'name' => 'required|min:3',
            'status' => 'required|in:1,0',
        ]);

        $categoria->create([
            'name' => $this->name,
            'status' => $this->status,
        ]);

    }


    public function edit($id)

    {
        // dd($categoria);
        $categoria = Categoria::findOrFail($id);

        $this->categoriaId = $categoria->id;
        $this->name = $categoria->name;
        $this->status = $categoria->status;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
            'status' => 'required|in:1,0',
        ]);

        $categoria = Categoria::findOrFail($this->categoriaId);

        $categoria->update([
            'name' => $this->name,
            'status' => $this->status,
        ]);

        $this->reset(['categoriaId', 'name','status']);
    }

    public function delete(Categoria $categoria)
    {

        $categoria->delete();
    }
}
