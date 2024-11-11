<div>
    <x-header 
        title="Lista de categorias" 
        subtitle="Adicione ou remova categorias" 
        size="text-2xl" 
        separator 
    >

        <x-slot:middle class="!justify-end">
            <x-input placeholder="Buscar" class="h-10" wire:model.live.debounce="search" clearable icon="o-magnifying-glass" />
        </x-slot:middle>

    </x-header>
    
    <x-table :headers="$headers" :rows="$categorias" :sort-by="$sortBy" with-pagination >
        @scope('actions', $categoria)
            <x-button 
                icon="o-trash" 
                spinner 
                class="btn-ghost btn-sm text-red-500" 
                wire:click="$dispatchTo('categoria.destroy', 'categoria::open-destroy', { id: {{ $categoria->id }} })" 
            />
        @endscope
    </x-table>
    

</div>
