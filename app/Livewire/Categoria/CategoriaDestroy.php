<?php

namespace App\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class CategoriaDestroy extends Component
{
    use Toast;

    public ? Categoria $categoria;

    public $modalDestroy = false;

    #[On('categoria::open-destroy')]
    public function showModalDestroy($id){
        $this->categoria = Categoria::findOrFail($id);
        $this->modalDestroy = true;
    }

    public function delete(){
        $this->categoria->delete();
        $this->dispatch('categoria::refresh');
        $this->modalDestroy = false;
        $this->success('Feito!', 'categoria apagada com sucesso.', position: 'toast-bottom toast-start', icon: 'o-face-smile' );
    }

    #[On('categoria::refresh')]
    public function render()
    {
        return view('livewire.categoria.categoria-destroy');
    }
}
