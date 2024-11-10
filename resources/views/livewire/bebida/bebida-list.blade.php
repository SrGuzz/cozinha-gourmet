<div>
    <x-header 
        title="Cardapio de bebidas" 
        subtitle="Selecione as bebidas para seu pedido" 
        size="text-2xl" 
        separator 
    />
    <div class="flex flex-wrap">
        @foreach ($bebidas as $bebida)
            <div class="p-2 w-1/4">
                <div class="borda-gradiente">
                    <x-card title="{{$bebida->name}}" class="borda-gradiente-inner" >
                        R$ {{number_format($bebida->value, 2, ',', '.')}}
                        <x-slot:figure>
                            <img src="{{$bebida->photo}}"/>
                        </x-slot:figure>
                        <x-slot:actions>
                            @if (!$bebida->active)
                                <x-button 
                                    icon="o-face-smile"
                                    label="Ativar" 
                                    wire:click="$dispatchTo('bebida.bebida-update', 'bebida::active', { id: {{ $bebida->id }} })" 
                                    class="btn-sm text-success" 
                                />
                            @else
                                <x-button 
                                    icon="o-face-frown"
                                    label="Desativar" 
                                    wire:click="$dispatchTo('bebida.bebida-update', 'bebida::disabled', { id: {{ $bebida->id }} })" 
                                    class="btn-sm text-error" 
                                />
                            @endif
                            
                            <x-button 
                                icon="o-pencil-square" 
                                wire:click="$dispatchTo('bebida.bebida-update', 'bebida::open-update', { id: {{ $bebida->id }} })" 
                                class="btn-sm text-warning" 
                            />
                        </x-slot:actions>
                    </x-card>
                </div>
            </div>
        @endforeach
        @livewire('bebida.bebida-update')
    </div>
</div>
