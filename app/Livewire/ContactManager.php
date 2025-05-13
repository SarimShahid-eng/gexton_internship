<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactManager extends Component
{
    public $contacts, $name, $email, $contactId;
    public $isModalOpen = false;

    public function render()
    {
        $this->contacts = Contact::latest()->get();
        return view('livewire.contact-manager');
    }

    public function create()
    {
        $this->resetFields();
        $this->openModal();
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $this->contactId,
        ]);

        Contact::updateOrCreate(['id' => $this->contactId], [
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('message', $this->contactId ? 'Contact updated' : 'Contact added');

        $this->closeModal();
        $this->resetFields();
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $this->contactId = $id;
        $this->name = $contact->name;
        $this->email = $contact->email;

        $this->openModal();
    }

    public function delete($id)
    {
        Contact::find($id)->delete();
        session()->flash('message', 'Contact deleted');
    }

    public function openModal()
    {
        $this->isModalOpen = true;
    }
    public function closeModal()
    {
        $this->isModalOpen = false;
    }
    public function resetFields()
    {
        $this->name = $this->email = $this->contactId = '';
    }
}
