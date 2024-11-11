<?php

namespace App\Livewire\Bebida;

use App\Models\Bebida;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class BebidaDestroy extends Component
{

    use Toast;

    public ? Bebida $bebida;

    public $modalDestroy = false;

    #[On('bebida::open-destroy')]
    public function showModalDestroy($id){
        $this->bebida = Bebida::findOrFail($id);
        $this->modalDestroy = true;
    }

    public function delete(){
        $this->bebida->delete();
        $this->dispatch('bebida::refresh');
        $this->modalDestroy = false;
        $this->dispatch('bebida::close-update');
        $this->success('Feito!', 'Bebida deletada com sucesso.', position: 'toast-bottom toast-start', icon: 'o-face-smile' );
    }

    public function render()
    {
        return view('livewire.bebida.bebida-destroy');
    }
}
