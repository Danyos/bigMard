<?php

namespace App\Http\Livewire;

use App\Models\Product\ItemModel;
use Livewire\Component;

class Item extends Component
{
    public $item=null;
    public $item_id=null;

    public function mount()
    {
        $this->item=ItemModel::with(['ItemGallery'])->orderBy('id','desc')->get();
    }

    public function showitems($id)
    {


        $this->emit('ShowItemState', $id);
        $this->item_id=$id;
    }
    public function render(){
        return view('livewire.item');
    }
}





















