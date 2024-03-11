<?php

namespace App\Http\Livewire;

use App\Models\Product\ItemGalleriesModel;
use Livewire\Component;

class ItemImages extends Component
{
    public $items;
    public function mount($item){
     $this->items=ItemGalleriesModel::where('item_id',$item)->get();

    }
    public function render()
    {
        return view('livewire.item-images');
    }
}
