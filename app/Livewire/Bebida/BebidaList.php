<?php

namespace App\Livewire\Bebida;

use App\Models\Bebida;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class BebidaList extends Component
{
    public $bebidas;

    public function mount(){
        $this->bebidas = Bebida::all();
    }

    #[Title('Bebidas')]
    #[On('bebida::refresh')]
    public function render()
    {
        return view('livewire.bebida.bebida-list');
    }
}
