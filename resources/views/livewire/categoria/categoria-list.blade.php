<div>
    <x-header title="Lista de categorias" subtitle="Adicione ou remova categorias" size="text-2xl" separator >

        <x-slot:middle class="!justify-end">
            <x-input 
                placeholder="Buscar" 
                class="h-10" 
                wire:model.live.debounce="search" 
                clearable 
                icon="o-magnifying-glass" 
            />
        </x-slot:middle>
        
        <x-slot:actions>
            <x-button 
                icon="o-plus" 
                class="btn-primary btn-sm h-10 bg-gradient-to-r from-purple-500 to-pink-300 border-none" 
                wire:click="$dispatchTo('categoria.categoria-create', 'categoria::open-create'})"
            />
        </x-slot:actions>

    </x-header>
    
    <x-table :headers="$headers" :rows="$categorias" :sort-by="$sortBy" with-pagination >
        @scope('actions', $categoria)
            <x-button 
                icon="o-trash" 
                spinner 
                class="btn-ghost btn-sm text-red-500" 
                wire:click="$dispatchTo('categoria.categoria-destroy', 'categoria::open-destroy', { id: {{ $categoria->id }} })" 
            />
        @endscope
    </x-table>
    
    @livewire('categoria.categoria-destroy')

</div>
