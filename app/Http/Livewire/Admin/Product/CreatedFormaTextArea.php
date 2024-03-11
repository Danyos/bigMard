<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;

class CreatedFormaTextArea extends Component
{

    public $contextBig;



    public function handleTextareaChange()
    {
        $this->emit('updateTextAreaValue', $this->contextBig);
    }


    public function render()
    {
        return view('livewire.admin.product.created-forma-text-area');
    }
}
