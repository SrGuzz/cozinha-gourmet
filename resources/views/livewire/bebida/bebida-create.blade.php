<div>
    <x-header 
        title="Adicionar bebida ao Cardápio" 
        subtitle="Adicione itens novos ao cardápio da cozinha" 
        size="text-2xl" 
        separator
    />

    <x-form wire:submit="save">
        <x-input 
            label="Nome" 
            placeholder="Nome da bebida" 
            icon="o-bookmark" 
            wire:model="name"
            class="border-red-500 focus:border-red-500 focus:outline-orange-500"
        />
        <x-select 
            label="Categoria" 
            icon="o-link" 
            :options="$categories" 
            option-value="name"
            option-label="name"
            wire:model="category"
            class="border-red-500 focus:border-red-500 focus:outline-orange-500" 
        />
        <x-input 
            label="Valor"  
            prefix="R$" 
            money 
            locale="pt-BR" 
            wire:model="value"
            class="border-red-500 focus:border-red-500 focus:outline-orange-500"
        />
        <x-file 
            wire:model="photo" 
            accept="image/*" 
            label="Imagem" 
            hint="Clique na imagem e selecione a foto da bebida" > 
            
                <img src="{{ $caminhoImg }}" class="h-40 w-80 rounded-lg" />

        </x-file>
     
        <x-slot:actions>
            <x-button label="Cancel" class="btn-error btn-sm" wire:click="cancel" spinner="cancel"/>
            <x-button label="Salvar" class="btn-success btn-sm" type="submit" spinner="save" />
        </x-slot:actions>
    </x-form>   
</div>
