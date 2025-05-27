<?php

namespace App\Livewire;

use App\Models\StudentDetail;
use App\Models\Task;
use Auth;
use Livewire\Component;

class CreateTask extends Component
{
    public function render()
    {

        $user = Auth::user();
        $studentDetail = $user->student_details()->where('result', 'pass')->first();

        if ($studentDetail) {
            $tasks = $studentDetail->tasks()->with('task_marks')->get();

            // dd($tasks);
        } else {
            $tasks = collect();
        }

        // dd($tasks);

        return view('livewire.create-task', compact('tasks'));
    }
}
