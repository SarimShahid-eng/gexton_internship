<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Course;
use Livewire\Component;
use App\Models\Teacher ;
use App\Models\BatchGroup;

class Group extends Component
{
    public $course_id, $teacher_id, $from, $to, $session_id, $group_name, $is_completed = 0 , $id;
    public function render()
    {
        $teachers = User::where('user_type','teacher')->get();
        $batches = BatchGroup::with('course')->get();
        $courses=Course::get();
        return view('livewire.group', compact('teachers','batches','courses'));
    }
    public function save()
    {
        // Validation rules
        $rules = [
            'course_id' => 'required',
            // 'teacher_id' => 'required',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i',
            'session_id' => 'required',
            'group_name' => 'required|string|max:255',
        ];
        // Validate the data
        $validatedData = $this->validate($rules);
$validatedData['teacher_id']=1;
        BatchGroup::updateOrCreate(
            ['id' => $this->id],
            $validatedData
        );

        session()->flash('message', $this->id ? 'Batch Group Updated Successfully' : 'Batch Group Created Successfully');

        // Reset the form fields
        $this->reset();
    }
    public function edit($id)
    {
        $batch = BatchGroup::find($id);
        $this->course_id = $batch->course_id;
        $this->teacher_id = $batch->teacher_id;
        $this->from = \Carbon\Carbon::parse($batch->from)->format('H:i');
        $this->to = \Carbon\Carbon::parse($batch->to)->format('H:i');
        $this->session_id = $batch->session_id;
        $this->group_name = $batch->group_name;
        $this->id = $id;
    }
    public function delete($id)
    {
        $batch = BatchGroup::find($id);
        if ($batch) {
            $batch->delete();
            session()->flash('message', 'Batch Group Deleted Successfully');
        } else {
            session()->flash('error', 'Batch Group Not Found');
        }
    }
}
