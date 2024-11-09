<?php

namespace App\Livewire\Bebida;

use App\Models\Bebida;
use Livewire\Component;

class BebidaList extends Component
{
    public $bebidas;

    public function mount(){
        $this->bebidas = Bebida::all();
    }

    public function render()
    {
        return view('livewire.bebida.bebida-list');
    }
}
