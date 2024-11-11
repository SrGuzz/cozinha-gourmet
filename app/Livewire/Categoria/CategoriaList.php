<?php

namespace App\Livewire\Categoria;

use App\Models\Categoria;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class CategoriaList extends Component
{
    use WithPagination;

    public $search = '';

    public array $sortBy = ['column' => 'name', 'direction' => 'asc'];

    public function categorias(){
        $query = Categoria::query();
        // Aplica filtro de busca se um termo for fornecido
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }

        // Aplica ordenação se os parâmetros forem fornecidos
        if ($this->sortBy) {
            $sortByValues = array_values($this->sortBy);

            // Verifica se sortBy tem o formato correto antes de aplicar
            if (count($sortByValues) === 2) {
                $query->orderBy($sortByValues[0], $sortByValues[1]);
            }
        }

        return $query->paginate('10');
    }

    public function headers() : array
    {   
        return [
            ['key' => 'id', 'label' => 'Id'],
            ['key' => 'name', 'label' => 'Nome'],
            ['key' => 'destino', 'label' => 'Destino'],
        ];
    }

    #[On('categoria::refresh')]
    public function render()
    {
        return view('livewire.categoria.categoria-list', [
            'headers' => $this->headers(),
            'categorias' => $this->categorias(),
        ]);
    }
}
