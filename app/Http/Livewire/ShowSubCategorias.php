<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\SubCategoria;
use Livewire\Component;
use Livewire\WithPagination;


class ShowSubCategorias extends Component
{

    use WithPagination;

    public $categorias;
    public $subcategorias = [];

    public $categoria_id;
    public $subcategoria_id;

    public $name = 'Alimento';

    public $status = '';

    public $categoriaId;

    protected $rules = [
        'categoria_id' => 'required|exists:categorias,id',
        'subcategoria_id' => 'required|exists|subcategorias,id',
    ];

    // protected $rules = [
    //     'name' => 'required|min:3|max:255',
    //     'status' => 'required|in:1,0',
    // ];


    protected $message = [
        'status.required' => 'Selecione um status antes de continuar.',
        'status.in' => 'Selecione uma opção válida.',
    ];


    public function mount(){
        $this->categorias = Categoria::all();
    }

    public function updatedCategoriaId($value)
    {
        $this->subcategorias = Subcategoria::where('categoria_id', $value)->get();
        $this->subcategoria_id  = null;
    }

    public function salvar()
    {
        $this->validate();
    }


    public function render()
    {
        $categorias = SubCategoria::latest()->paginate(10);
        return view('livewire.show-sub_categorias', ['categorias' => $categorias]);
    }


    // public function create(SubCategoria $categoria){

    //      $this->validate([
    //         'name' => 'required|min:3',
    //         'status' => 'required|in:1,0',
    //     ]);

    //     $categoria->create([
    //         'name' => $this->name,
    //         'status' => $this->status,
    //     ]);

    // }


    // public function edit($id)

    // {
    //     // dd($categoria);
    //     $categoria = SubCategoria::findOrFail($id);

    //     $this->categoriaId = $categoria->id;
    //     $this->name = $categoria->name;
    //     $this->status = $categoria->status;
    // }

    // public function update()
    // {
    //     $this->validate([
    //         'name' => 'required|min:3',
    //         'status' => 'required|in:1,0',
    //     ]);

    //     $categoria = SubCategoria::findOrFail($this->categoriaId);

    //     $categoria->update([
    //         'name' => $this->name,
    //         'status' => $this->status,
    //     ]);

    //     $this->reset(['categoriaId', 'name','status']);
    // }

    // public function delete(SubCategoria $categoria)
    // {

    //     $categoria->delete();
    // }
}
