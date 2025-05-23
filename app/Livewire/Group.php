<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use Livewire\Component;
use App\Models\BatchGroup;
use Livewire\WithPagination;
use App\Models\CustomSession;

class Group extends Component
{
    use WithPagination;

    public $course_id, $teacher_id, $from, $to, $session_id, $session_year_id, $group_name, $is_completed = 0, $id;
    public function render()
    {
        $session_active = CustomSession::where('is_selected', 1)->first();
        $this->session_year_id = $session_active->id;
        $teachers = User::where('user_type','teacher')->get();
        $courses = Course::get();
        $batches = BatchGroup::with('teacher', 'sessionYear', 'course')->paginate(10);
        return view('livewire.group', compact('teachers', 'batches', 'courses', 'session_active'));
    }
    public function save()
    {
        // Validation rules
        $rules = [
            'course_id' => 'required',
            'teacher_id' => 'required',
            'from' => 'required|date_format:H:i',
            'to' => 'required|date_format:H:i',
            'session_year_id' => 'required',
            'group_name' => 'required|string|max:255',
        ];
        // Validate the data
        $validatedData = $this->validate($rules);
        BatchGroup::updateOrCreate(
            ['id' => $this->id],
            $validatedData
        );
        $message = $this->id ? 'updated' : 'saved';
        $this->reset();
        $this->dispatch(
            'course-saved',
            title: 'Success!',
            text: "Group has been $message successfully.",
            icon: 'success',
        );
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
    public function confirmDelete($confirmId)
    {
        $this->id = $confirmId;
        $this->dispatch('swal-confirm');
    }
    public function deleteCourse()
    {
        BatchGroup::destroy($this->id); // Find the course by ID

        $this->dispatch('course-deleted', title: 'Deleted!', text: 'Group has been deleted successfully.', icon: 'success');
    }
}
