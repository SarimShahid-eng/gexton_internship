<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Teacher as TeacherModel;
use Illuminate\Support\Facades\Crypt;


class Teacher extends Component
{
    public $first_name, $last_name, $email, $phone, $session, $password, $status, $id;



    public function render()
    {
        $teachers = TeacherModel::get();
        return view('livewire.teacher', compact('teachers'));
    }
    public function save()
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:teachers,email',
            'phone' => 'required|unique:teachers,phone',
            'session' => 'required',
            'status' => 'required',
        ];

        // If updating, ignore unique check for current record
        if ($this->id) {
            $rules['email'] = 'required|email|unique:teachers,email,' . $this->id;
            $rules['phone'] = 'required|unique:teachers,phone,' . $this->id;
        }

        $validatedData = $this->validate($rules);

        // Encrypt password if provided
        if ($this->password) {
            $validatedData['password'] = Crypt::encrypt($this->password);
        }

        if ($this->id) {
            TeacherModel::where('id', $this->id)->update($validatedData);
            session()->flash('message', 'Teacher Updated Successfully');
        } else {
            TeacherModel::create($validatedData);
            session()->flash('message', 'Teacher Created Successfully');
        }

        $this->reset();
    }
    function edit($id)
    {
        $teacher = TeacherModel::find($id);

        $this->first_name = $teacher->first_name;
        $this->last_name = $teacher->last_name;
        $this->email = $teacher->email;
        $this->phone = $teacher->phone;
        $this->session = $teacher->session;
        // $this->password = $password;
        $this->status = $teacher->status;
        $this->id = $teacher->id;
    }
    function delete($id)
    {
        $teacher = TeacherModel::find($id);
        $teacher->delete();
        session()->flash('message', 'Teacher Deleted Successfully');
    }

}
