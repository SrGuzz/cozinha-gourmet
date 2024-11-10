<div>
    @if ($modalUpdate)
        <x-drawer wire:model="modalUpdate" class="w-11/12 lg:w-1/3" title="Editar bebida do Cardápio" right>
            <x-form wire:submit="save">
                <x-input 
                    label="Nome" 
                    value="{{ $name }}" 
                    icon="o-bookmark"  
                    wire:model="name"
                />

                <x-input
                    label="Valor"
                    wire:model="value"
                    prefix="R$"
                    money
                    locale="pt-BR" 
                />

                <x-file 
                    wire:model="photo" 
                    accept="image/*" 
                    label="Imagem" 
                    hint="Clique na imagem e selecione a foto da bebida" 
                    change-text=""> 
                    
                        <img src="{{ $photo }}" class="h-40 w-80 rounded-lg" />

                </x-file>
             
                <x-slot:actions>
                    <x-button 
                        icon="o-trash" 
                        wire:click="$dispatchTo('bebida.bebida-destroy', 'bebida::open-destroy', { id: {{ $id }} })" 
                        class="btn-sm text-error" 
                    />
                    <x-button 
                        label="Cancelar" 
                        @click="$wire.modalUpdate = false" 
                        class="btn-sm"
                    />
                    <x-button 
                        label="Salvar" 
                        class="btn-success btn-sm" 
                        type="submit" 
                        spinner="save"
                    />
                </x-slot:actions>
            </x-form>
        </x-drawer>
    @endif

    @livewire('bebida.bebida-destroy')
</div>
