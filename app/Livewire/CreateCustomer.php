<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class CreateCustomer extends Component
{
    public $name = '';

    public $email = '';
    public function render()
    {
        $contacts = Contact::all();
        return view('livewire.create-customer', compact('contacts'));
    }
    public function save()
    {
        $validated = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email',
        ]);
        Contact::create($validated);
        $this->reset();
    }
}
