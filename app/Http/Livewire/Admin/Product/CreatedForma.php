<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Product\ItemModel;
use Livewire\Component;

class CreatedForma extends Component
{
    public $slug = null;
    public $title = null;
    public $price = null;
    public $discount = null;
    public $time = null;
    public $date = null;

    public $imgText = null;
    public $youtubUrl = null;
    public $underImages = null;
    public $coverImages = null;
    public $middleOfImages = null;
    public $status = '1';
    public $productImages = [];
    public $contextBig = null;

    protected $listeners = [
        'updateTextAreaValue' => 'updateTextArea'
    ];

    public function updateTextArea($newValue)
    {
dd($newValue);
        $this->contextBig  = $newValue;
    }

    public function rules()
    {
        return [
            'title' => 'required',
            'price' => 'required',
            'discount' => 'required',
//            'time' => 'required',
//            'date' => 'required',
            'contextBig' => 'required',
//            'imgText' => 'required',
//            'youtubUrl' => 'required',
//            'underImages' => 'required',
//            'coverImages' => 'required',
//            'middleOfImages' => 'required',
//            'status' =>  ['required', 'in:0,1'],
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Ենթակա վերնագիրը պարտադիր է:',
            'price.required' => 'Գինը պարտադիր է:',
            'discount.required' => 'Զեղչը պարտադիր է:',
            'time.required' => 'Ժամը պարտադիր է:',
            'date.required' => 'Ամսաթիվը պարտադիր է:',
            'contextBig.required' => 'Մատերիալը պարտադիր է:',
            'imgText.required' => 'Նկարի վերնագիրը պարտադիր է:',
            'youtubUrl.required' => 'YouTube-ի URL-ը պարտադիր է:',
            'underImages.required' => 'Ենթակա նկարները պարտադիր են:',
            'coverImages.required' => 'Բակերային նկարները պարտադիր են:',
            'middleOfImages.required' => 'Նկարների մեջտեղինը պարտադիր է:',
            'status.required' => 'Կարգավիճակը պարտադիր է:',
            'status.in' => 'Կարգավիճակը պետք է ընտրվի 0 կամ 1:'
        ];
    }

    public function sendClientData()
    {

        $validatedData = $this->validate();

        ItemModel::cretae([
            'name' => $this->title,
            'description' => $this->contextBig,
            'price' => $this->price,
            'discount' => $this->discount,
            'category_id' => 1,

        ]);

        session()->flash('success', 'Record created successfully.');

        // Reset the form fields
        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.product.created-forma');
    }
}
