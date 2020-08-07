<?php

namespace App\Http\Livewire;

use \App\Contact;
use Livewire\Component;

class ContactUpdate extends Component
{
	public $name;
	public $phone;
	public $idContact;

	protected $listeners = [
		'getContact' => 'showContact'
	];

	public function render()
	{
		return view('livewire.contact-update');
	}

	public function showContact($contact)
	{
		$this->name = $contact['name'];
		$this->phone = $contact['phone'];
		$this->idContact = $contact['id'];
	}

	public function update()
	{
		$this->validate([
			'name' => 'required',
			'phone' => 'required|max:15'
		]);

		if($this->idContact) {
			$contact = Contact::find($this->idContact);
			$contact->update([
				'name' => $this->name,
				'phone' => $this->phone,
			]);
		}

		$this->resetInput();

		$this->emit('contactUpdated', $contact);
	}

	public function resetInput()
	{
		$this->name = '';
		$this->phone = '';
	}
}
