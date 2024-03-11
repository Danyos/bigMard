<?php

namespace App\Http\Livewire;

use App\Models\CallupModel;
use Livewire\Component;

class CallNumberInput extends Component
{
    public $item_id=null;
    public $type_id=null;
    public $phone="+374";

    public function mount($type_id,$item_id){
        $this->item_id=$item_id;
        $this->type_id=$type_id;
    }
    public function rules()
    {
        return [
            'phone' => ['required', 'regex:/^(\+)?[0-9\s]+$/','min:8','max:16'],
            'type_id' =>  ['required'],
            'item_id' =>  ['required'],
        ];
    }
    public function messages()
    {
        return [
            'phone.required' => 'Հեռախոսահամարը պարտադիր է',
            'phone.regex' => 'Հեռախոսահամարը ճիշտ ձևաչափով չէ',
            'phone.min' => 'Հեռախոսահամարը պետք է ունենա ամենաքիչ 8 նիշ',
            'phone.max' => 'Հեռախոսահամարը չպետք է լինի ավելի քան 16 նիշ',
            'type.required' => 'Տեսակը պարտադիր է',
        ];
    }
    public function sendClientData(){
        $validatedData = $this->validate();

        CallupModel::create([
            'type_id'=>$this->type_id,
            'item_id'=>$this->item_id,
            'phone'=>$this->phone,
        ]);

        session()->flash('success', 'Record created successfully.');

        // Reset the form fields
        $this->reset();
    }


    public function render()
    {
        return view('livewire.call-number-input');
    }
}
