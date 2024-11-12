<?php

namespace App\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class CategoriaCreate extends Component
{
    use Toast;

    public $name;
    public $destino = 'bebidas';

    public $destinos = [
        ['label' => 'Bebidas', 'value' => 'bebidas'],
        ['label' => 'Pratos', 'value' => 'pratos'],
    ];

    public $modalCreate = false;

    #[On('categoria::open-create')]
    public function showModalCreate(){
        $this->modalCreate = true;
    }

    public function save(){
        $this->validate();
        
        $categoria = [
            'name' => $this->name,
            'destino' => $this->destino,
        ];

        Categoria::create($categoria);

        $this->modalCreate = false;
        $this->dispatch('categoria::refresh');
        $this->reset();
        $this->success('Feito!', 'Bebida cadastrada com sucesso.', position: 'toast-bottom toast-start', icon: 'o-face-smile' );
    }

    public function rules(){
        return [
            'name' => 'required|string|min:3|unique:categorias',
            'destino' => 'required|min:3|string',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatório. Por favor, preencha o nome da categoria.',
            'name.string' => 'O nome da categoria deve ser um texto válido.',
            'name.unique' => 'Já existe uma categoria com este nome. Escolha um nome diferente.',
            'name.min' => 'O nome deve ter no minimo :min letras',

            'destino.required' => 'O campo destino é obrigatório. Por favor, preencha o destino da categoria.',
            'destino.string' => 'O destino da categoria deve ser um texto válido.',
            'destino.min' => 'O nome deve ter no minimo :min letras',
        ];
    }

    public function render()
    {
        return view('livewire.categoria.categoria-create');
    }
}
