<div>
    @if ($modalDestroy)
        <x-modal wire:model="modalDestroy" persistent title="Apagar">
            <div>Tem certeza que deseja apagar a bebida {{$bebida->name}} ?</div>
            <x-slot:actions>
                <x-button label="Cancelar" @click="$wire.modalDestroy = false" class="btn-sm" />
                <x-button icon="o-check" label="Confirmar" class="btn-error btn-sm" wire:click="delete" />
            </x-slot:actions>
        </x-modal>
    @endif
</div>
