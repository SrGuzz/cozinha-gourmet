<div>
    <x-drawer wire:model="modalCreate" class="w-11/12 lg:w-1/3" right>
        <x-form wire:submit="save">
            <x-input 
                label="Nome" 
                wire:model="name"
            />
            <x-radio
                label="Destino"
                :options="$destinos"
                option-value="value"
                option-label="label"
                wire:model="destino"
                hint="Selecione o destino da categoria"
                class="btn-sm" 
            />
            <x-slot:actions>
                <x-button 
                    label="Cancelar" 
                    @click="$wire.modalCreate = false" 
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
</div>
