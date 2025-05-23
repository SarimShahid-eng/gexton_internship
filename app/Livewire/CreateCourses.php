<?php

namespace App\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CustomSession;
use Livewire\WithoutUrlPagination;

class CreateCourses extends Component
{
    use WithPagination;
    protected $paginationTheme='tailwind';
    public $course_title, $course_description, $Duration, $created_date, $session_year_id, $test_time, $questions_limit, $hours, $minutes, $update_id, $courseIdToDelete;
    public function render()
    {
          $session_active = CustomSession::where('is_selected', 1)->first();
        $this->session_year_id = $session_active->id;
        $courses = Course::paginate(10);
        return view('livewire.create-courses', compact('courses','session_active'));
    }
    public function save()
    {
        $validated = $this->validate([
            'course_title' => 'required',
            'course_description' => 'required',
            'hours' => 'required',
            'minutes' => 'required',
            'Duration' => 'required',
            'created_date' => 'nullable',
            'session_year_id' => 'required',
            'test_time' => 'nullable',
            'questions_limit' => 'required',
        ]);

        $formTestTime = $this->hours . ':' . $this->minutes . ':00';
        $validated['test_time'] = $formTestTime;
        $session_id = CustomSession::latest()->first();
        // $validated['session_year_id'] = $session_id->id;
        $validated['created_date'] = now();
        Course::updateOrCreate(
            ['id' => $this->update_id],
            $validated
        );

        $message = $this->update_id ? 'updated' : 'saved';
        $this->reset();
        $this->dispatch(
            'course-saved',
            title: 'Success!',
            text: "Course has been $message successfully.",
            icon: 'success',
        );
    }
    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $this->course_title = $course->course_title;
        $this->course_description = $course->course_description;
        $this->questions_limit = $course->questions_limit;
        [$hours, $minutes, $seconds] = explode(':', $course->test_time);
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->Duration = $course->Duration;
        $this->update_id = $course->id;
    }
    public function delete($id)
    {
        $course = Course::findOrFail($id);
        $this->course_title = $course->course_title;
        $this->course_description = $course->course_description;
        $this->questions_limit = $course->questions_limit;
        [$hours, $minutes, $seconds] = explode(':', $course->test_time);
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->Duration = $course->Duration;
        $this->update_id = $course->id;
    }
    public function confirmDelete($courseId)
    {
        $this->courseIdToDelete = $courseId;
        $this->dispatch('swal-confirm');
    }
    public function deleteCourse()
    {
        Course::destroy($this->courseIdToDelete);
        $this->dispatch('course-deleted', title: 'Deleted!', text: 'Course has been deleted successfully.', icon: 'success');
    }
}
