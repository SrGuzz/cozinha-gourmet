<?php

namespace App\Livewire\Bebida;

use App\Models\Bebida;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class BebidaUpdate extends Component
{

    use Toast;
    use WithFileUploads;

    public $id;
    public $name;
    public $value;
    public $active;
    public $photo;

    public $backupPhoto;

    public $activies = [
        ['value' => true, 'label' => 'Ativo'],
        ['value' => false, 'label' => 'Inativo']
    ];

    public $modalUpdate = false;

    #[On('bebida::open-update')]
    public function showUpdateModal($id){
        $bebida = Bebida::findOrFail($id);
        $this->id = $bebida->id;
        $this->value = $bebida->value;
        $this->name = $bebida->name;
        $this->active = $this->trueFalse($bebida->active);
        $this->photo = $this->backupPhoto = $bebida->photo;
        $this->modalUpdate = true;
    }

    public function trueFalse($valor){
        return $valor == 1;
    }

    public function save(){
        $this->validate();
        $path = $this->backupPhoto;

        if($this->backupPhoto != $this->photo && is_object($this->photo)){
            $filename = $this->photo->getClientOriginalName();
            $path = $this->photo->storeAs('bebidas',$filename, 'public');
            $path = '/storage' . '/' . $path;
        }


        $bebida = Bebida::findOrFail($this->id);
        $bebida->update([
            'name' => $this->name,
            'value' => $this->value,
            'active' => $this->active,
            'photo' => $path,
        ]);

        $this->dispatch('bebida::refresh');
        $this->modalUpdate = false;
        $this->success('Feito!', 'Bebida atualizada com sucesso.', position: 'toast-bottom toast-start', icon: 'o-face-smile' );
    }

    #[On('bebida::active')]
    public function active($id){
        $bebida = Bebida::findOrFail($id);
        $bebida->update([
            'active' => 1,
        ]);
        $this->dispatch('bebida::refresh');
        $this->success('Feito!', 'Bebida ativada com sucesso.', position: 'toast-bottom toast-start', icon: 'o-face-smile' );
    }

    #[On('bebida::disabled')]
    public function disabled($id){
        $bebida = Bebida::findOrFail($id);
        $bebida->update([
            'active' => 0,
        ]);
        $this->dispatch('bebida::refresh');
        $this->success('Feito!', 'Bebida desativada com sucesso.', position: 'toast-bottom toast-start', icon: 'o-face-smile' );
    }

    public function rules(){
        return [
            'name' => 'required|string|unique:pratos',
            'value' => 'required|numeric',
            'photo' => 'required|max:32768',
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
            'photo.max' => 'A imagem não deve exceder 32 MB. Escolha um arquivo menor.',
        ];
    }

    #[On('bebida::refresh')]
    public function render()
    {
        return view('livewire.bebida.bebida-update');
    }
}
