<div>
    <x-header title="Lista de categorias" subtitle="Adicione ou remova categorias" size="text-2xl" separator >

        <x-slot:middle class="!justify-end">
            <x-input 
                placeholder="Buscar" 
                class="h-10 border-red-500" 
                wire:model.live.debounce="search" 
                clearable 
                icon="o-magnifying-glass" 
            />
        </x-slot:middle>
        
        <x-slot:actions>
            <x-button 
                icon="o-plus" 
                class="btn text-black btn-sm h-10 bg-gradient-to-r from-red-500 to-orange-300 border-none" 
                wire:click="$dispatchTo('categoria.categoria-create', 'categoria::open-create')"
            />
        </x-slot:actions>
    </x-header>
    @livewire('categoria.categoria-create')
    
    <x-card>
        <x-table :headers="$headers" :rows="$categorias" striped :sort-by="$sortBy" with-pagination  >
            @scope('actions', $categoria)
                <x-button 
                    icon="o-trash" 
                    spinner 
                    class="btn-ghost btn-sm text-red-500" 
                    wire:click="$dispatchTo('categoria.categoria-destroy', 'categoria::open-destroy', { id: {{ $categoria->id }} })" 
                />
            @endscope
        </x-table>
    </x-card>
    
    @livewire('categoria.categoria-destroy')

</div>
