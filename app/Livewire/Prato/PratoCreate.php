<?php

namespace App\Livewire\Prato;

use App\Models\Categoria;
use App\Models\Prato;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;
use Ramsey\Uuid\Type\Integer;

class PratoCreate extends Component
{
    use WithFileUploads;

    use Toast;

    public $name;
    public $description;
    public $value;
    public $photo;
    public $category;

    public $categories;

    public $caminhoImg = '/storage/pratos/exemple.webp';

    public function save()
    {
        $this->category = intval($this->category);

        $this->validate();

        $filename = $this->photo->getClientOriginalName();
        $path = $this->photo->storeAs('fotos',$filename, 'public');

        $prato = [
            'name' => $this->name,
            'description' => $this->description,
            'value' => $this->value,
            'photo' => '/storage' . '/' . $path,
            'category_id' => $this->category,
        ];

        Prato::create($prato);
        $this->success('Feito!', 'Prato cadastrado com sucesso.', position: 'toast-bottom toast-start', icon: 'o-face-smile' );
    }

    public function cancel(){
        $this->reset();
        $this->category = $this->categories[0]['name'];
    }

    public function rules(){
        return [
            'name' => 'required|string|unique:pratos',
            'description' => 'required|string',
            'value' => 'required|numeric',
            'photo' => 'required|image|max:32768',
            'category' => 'required|exists:categorias,id',
        ];
    }

    public function messages(){
        return [
            'name.required' => 'O campo nome é obrigatório. Por favor, preencha o nome do prato.',
            'name.string' => 'O nome do prato deve ser um texto válido.',
            'name.unique' => 'Já existe um prato com este nome. Escolha um nome diferente.',

            'description.required' => 'O campo descrição é obrigatório. Por favor, descreva o prato.',
            'description.string' => 'A descrição deve ser um texto válido.',

            'value.required' => 'O campo valor é obrigatório. Por favor, informe o valor do prato.',
            'value.numeric' => 'O valor do prato deve ser numérico. Insira um valor válido.',

            'photo.required' => 'É necessário enviar uma foto do prato.',
            'photo.image' => 'A foto deve ser uma imagem válida (formatos aceitos: jpeg, png, bmp, etc).',
            'photo.max' => 'A imagem não deve exceder 32 MB. Escolha um arquivo menor.',

            'category.required' => 'O campo categoria é obrigatório. Por favor, preencha o categoria do prato.',
            'category.exists' => 'A categoria selecionada não é válida.',
        ];
    }

    public function mount(){
        $this->categories = Categoria::where('destino', 'pratos')->get()->toArray();

        usort($this->categories, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });
        $this->category = $this->categories[0]['id'];
    }

    public function render()
    {
        return view('livewire.prato.prato-create');
    }
}
