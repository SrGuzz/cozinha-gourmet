<?php

namespace App\Livewire\Bebida;

use App\Models\Bebida;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class BebidaUpdate extends Component
{

    use Toast;

    public ?Bebida $bebida;

    public $modalUpdate = false;

    #[On('bebida::open-update')]
    public function showUpdateModal($id){
        $this->bebida = Bebida::findOrFail($id);
        $this->modalUpdate = true;
    }

    public function render()
    {
        return view('livewire.bebida.bebida-update');
    }
}
