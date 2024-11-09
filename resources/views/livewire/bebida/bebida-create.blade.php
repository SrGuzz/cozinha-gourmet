<div>
    <x-header 
        title="Adicionar bebida ao Cardápio" 
        subtitle="Adicione itens novos ao cardápio da cozinha" 
        size="text-2xl" 
        separator 
        class="text-w"
    />

    <x-form wire:submit="save">
        <x-input 
            label="Nome" 
            placeholder="Nome da bebida" 
            icon="o-bookmark" 
            wire:model="name"
        />
        <x-select 
            label="Categoria" 
            icon="o-link" 
            :options="$categorys" 
            option-value="value"
            option-label="label"
            wire:model="category" 
        />
        <x-input 
            label="Valor"  
            prefix="R$" 
            money 
            locale="pt-BR" 
            wire:model="value"
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
