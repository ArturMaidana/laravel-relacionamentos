<?php

namespace App\Http\Livewire;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithPagination;


class ShowMarcas extends Component
{

    use WithPagination;

    public $name = 'Nike';
    public $status = '';

    public $marcaId;

    // protected $rules = [
    //     'name' => 'required|min:3|max:255'
    // ];

    public function render()
    {
        $marcas = Marca::latest()->paginate(10);
        return view('livewire.show-marcas', ['marcas' => $marcas]);
    }


    public function create(Marca $marcas){

         $this->validate([
            'name' => 'required|min:3',
            'status' => 'required|in:1,0',
        ]);

        $marcas->create([
            'name' => $this->name,
            'status' => $this->status,
        ]);

    }


    public function edit($id)

    {
        // dd($categoria);
        $marcas = Marca::findOrFail($id);

        $this->marcaId = $marcas->id;
        $this->name = $marcas->name;
        $this->status = $marcas->status;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3',
        ]);

        $marcas = Marca::findOrFail($this->marcaId);

        $marcas->update([
            'name' => $this->name,
            'status' => $this->status,
        ]);

        $this->reset(['marcaId', 'name', 'status']);
    }

    public function delete(Marca $marcas)
    {

        $marcas->delete();
    }
}
