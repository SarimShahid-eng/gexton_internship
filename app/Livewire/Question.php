<?php

namespace App\Livewire;
use App\Models\Question as DataQuestion;
use Livewire\Component;
class Question extends Component
{
    // public array $options = [''];;
    public $course_id, $session_id, $title, $question, $id, $options = [], $correct_answer;

    public function render()
    {
        $questions = DataQuestion::with(['course'])->get();
        return view('livewire.question', compact('questions'));
    }
    public function save()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'course_id' => 'required|integer',
            'session_id' => 'required|integer',
            'question' => 'required|string',
            'correct_answer' => 'required',
        ];
        $validatedData = $this->validate($rules);
        // $validatedData['options'] = json_encode($this->options);
        $validatedData['options'] = serialize($this->options);

        DataQuestion::updateOrCreate(
            ['id' => $this->id],
            $validatedData
        );
        $message = $this->id ? 'updated' : 'saved';

        $this->reset();
        $this->dispatch(
            'course-saved',
            title: 'Success!',
            text: "Question has been $message successfully.",
            icon: 'success',
        );
    }
    public function edit($id)
    {
        $question = DataQuestion::find($id);

        $this->course_id = $question->course_id;
        $this->session_id = $question->session_id;
        $this->title = $question->title;
        $this->question = $question->question;
        $this->correct_answer = $question->correct_answer;
        $this->options = $question->options;
        $this->id = $id;
        $this->dispatch('edit-question-loaded',
            options : unserialize($this->options),
            correct_answer : $this->correct_answer,
        );
    }

}
