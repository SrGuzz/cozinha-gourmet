<div>
    @if ($modalUpdate)
        <x-modal wire:model="modalUpdate" persistent>
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

                <x-toggle 
                    right
                    tight
                    label="Ativo" 
                    wire:model="active"
                />
             
                <x-slot:actions>
                    <x-button 
                        label="Cancelar" 
                        @click="$wire.modalUpdate = false" 
                        class="btn-sm btn-error"
                    />
                    <x-button 
                        label="Salvar" 
                        class="btn-success btn-sm" 
                        type="submit" 
                        spinner="save"
                    />
                </x-slot:actions>
            </x-form>
        </x-modal>
    @endif
</div>
