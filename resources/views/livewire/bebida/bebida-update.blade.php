<div>
    @if ($modalUpdate)
        <x-modal wire:model="modalUpdate" persistent>
            <div>Processing ...</div>
            <x-slot:actions>
                <x-button label="Cancel" @click="$wire.modalUpdate = false" />
            </x-slot:actions>
        </x-modal>
    @endif
</div>
