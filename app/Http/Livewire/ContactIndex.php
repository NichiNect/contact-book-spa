<?php

namespace App\Http\Livewire;

use \App\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class ContactIndex extends Component
{
	use WithPagination;

	public $statusUpdate = FALSE;

	protected $listeners = [
		'contactStored' => 'handleStored',
		'contactUpdated' => 'handleUpdated',
	];

    public function render()
    {
        return view('livewire.contact-index', [
        	'contacts' => Contact::latest()->paginate(5),
        ]);
    }

    public function getContact($id)
    {
    	$this->statusUpdate = TRUE;
    	$contact = Contact::find($id);
    	$this->emit('getContact', $contact);
    }

    public function destroy($id)
    {
    	if ($id) {
    		$data = Contact::find($id);
    		$data->delete();
    		session()->flash('status', 'Contact was deleted from database!');
    	}
    }

    public function handleStored($contact)
    {
    	session()->flash('status', 'Contact ' . $contact['name'] . ' was stored to database!');
    }

    public function handleUpdated($contact)
    {
    	session()->flash('status', 'Contact ' . $contact['name'] . ' was updated!');
    }
}
