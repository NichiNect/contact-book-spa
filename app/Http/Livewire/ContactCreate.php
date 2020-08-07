<?php

namespace App\Http\Livewire;

use \App\Contact;
use Livewire\Component;

class ContactCreate extends Component
{
	public $name;
	public $phone;

    public function render()
    {
        return view('livewire.contact-create');
    }

    public function store()
    {
    	$this->validate([
    		'name' => 'required',
    		'phone' => 'required|max:15'
    	]);

    	$dataContact = Contact::create([
    		'name' => $this->name,
    		'phone' => $this->phone
    	]);

    	$this->resetInput();

    	$this->emit('contactStored', $dataContact);
    }

    public function resetInput()
    {
    	$this->name = '';
    	$this->phone = '';
    }
}
