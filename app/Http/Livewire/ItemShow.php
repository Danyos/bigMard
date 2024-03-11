<?php

namespace App\Http\Livewire;

use App\Models\Product\ItemModel;
use Livewire\Component;

class ItemShow extends Component
{
    public $itemId;
    public $items;
    public $ModalOpen=false;

    protected $listeners = [
        'ShowItemState' => 'showItem',
    ];

    public function mount($id = null)
    {
        $this->itemId = $id;

    }

    public function refreshComponent()
    {
        $this->mount($this->itemId);

    } public function closeModal()
    {
           $this->ModalOpen=false;

    }

    public function showItem($id = 1)
    {

        $this->itemId = $id;
        $this->ModalOpen=true;
        $this->items = ItemModel::with('ItemGalleries')->find($id);
        $this->emit('refreshComponent');
        $this->dispatchBrowserEvent('openModal', ['someParameter' => 'some value']);

    }

    public function render()
    {
        return view('livewire.item-show');
    }
}
