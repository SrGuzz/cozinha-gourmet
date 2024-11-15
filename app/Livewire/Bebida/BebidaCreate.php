<?php

namespace App\Livewire\Bebida;

use App\Models\Bebida;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class BebidaCreate extends Component
{
    use WithFileUploads;

    use Toast;

    public $name;
    public $value;
    public $photo;
    public $category;

    public $categorys = [
        ['label' => 'Refrigerante', 'value' => 1],
        ['label' => 'Suco Natural', 'value' => 2],
        ['label' => 'Cerveja', 'value' => 3],
        ['label' => 'Vinho', 'value' => 4],
        ['label' => 'Coquetel', 'value' => 5],
        ['label' => 'Café', 'value' => 6],
        ['label' => 'Chá Gelado', 'value' => 7],
        ['label' => 'Agua Mineral', 'value' => 8],
        ['label' => 'Smoothie', 'value' => 9],
        ['label' => 'Whisky', 'value' => 10]
    ];    

    public $caminhoImg = '/storage/bebidas/exemple-drink.webp';

    public function save()
    {
        $this->validate();

        $filename = $this->photo->getClientOriginalName();
        $path = $this->photo->storeAs('bebidas',$filename, 'public');

        $prato = [
            'name' => $this->name,
            'value' => $this->value,
            'photo' => '/storage' . '/' . $path,
            'category' => $this->category,
        ];

        Bebida::create($prato);
        $this->success('Feito!', 'Bebida cadastrada com sucesso.', position: 'toast-bottom toast-start', icon: 'o-face-smile' );
    }

    public function cancel(){
        $this->reset();
        $this->category = $this->categorys[0]['value'];
    }

    public function rules(){
        return [
            'name' => 'required|string|unique:pratos',
            'value' => 'required|numeric',
            'photo' => 'required|image|max:32768',
            'category' => 'required|numeric',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatório. Por favor, preencha o nome da bebida.',
            'name.string' => 'O nome da bebida deve ser um texto válido.',
            'name.unique' => 'Já existe um prato com este nome. Escolha um nome diferente.',

            'value.required' => 'O campo valor é obrigatório. Por favor, informe o valor da bebida.',
            'value.numeric' => 'O valor da bebida deve ser numérico. Insira um valor válido.',

            'photo.required' => 'É necessário enviar uma foto da bebida.',
            'photo.image' => 'A foto deve ser uma imagem válida (formatos aceitos: jpeg, png, bmp, etc).',
            'photo.max' => 'A imagem não deve exceder 32 MB. Escolha um arquivo menor.',

        ];
    }

    public function mount(){
        usort($this->categorys, function ($a, $b) {
            return strcmp($a['label'], $b['label']);
        });
        $this->category = $this->categorys[0]['value'];
    }

    public function render()
    {
        return view('livewire.bebida.bebida-create');
    }
}
