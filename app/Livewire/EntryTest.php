<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Result;
use Livewire\Component;
use App\Models\Question;
use App\Models\TestMark;
use App\Models\CustomSession;
use App\Models\StudentDetail;
use Illuminate\Support\Facades\Auth;

class EntryTest extends Component
{
    public $questions;
    public $results = [];
    public $wrongQuestionCount, $correctQuestionCount, $totaltestQuestionCount, $totalStudentAttemptedQuest, $totalQuestionForResult;
    public $totalTestTimeInSeconds, $currentIndex = 0, $currentQuestion, $selectedOption = null, $user;
    public $sessionId;
    public $testStarted = false;
    public int $durationMinutes = 0;
    public int $durationSeconds = 0;
    public  $percentage = 0;
    public $isCompleted = false;
    protected $listeners = ['setRemainingTime' => 'setRemainingTime'];

    public function mount()
    {


        $user = Auth::user();
        $this->sessionId = CustomSession::where('is_selected', 1)->first();
        $this->user = $user;
        $user = $user->load([
            'student_details:id,course_id,user_id,test_countdown,entry_test,test_started',
            'student_details.course:id,course_title,test_time'
        ]);


        $studentDetails = $user->student_details;
        $this->testStarted = $studentDetails->test_started;

        $userSessionId = $user->session_year_id;
        $userCourseId = $studentDetails->course_id;
        $questionAttemptedCount = Result::where('user_id', $user->id)
            ->where('course_id', $userCourseId)
            ->where('session_id', $userSessionId)
            ->count();
        if ($questionAttemptedCount > 1) {
            $this->currentIndex = $questionAttemptedCount;
        }
        $getStudentPerformance = TestMark::where('course_id', $userCourseId)->where('session_id', $userSessionId)->where('student_id', $user->id)->first();
        $this->isCompleted = $studentDetails->entry_test;
        if (!is_null($getStudentPerformance)) {
            // $this->totaltestQuestionCount = $getStudentPerformance->total_questions;
            // dd($this->totaltestQuestionCount);

            $this->percentage = $getStudentPerformance->percentage;
        }
        $this->questions = Question::where('course_id', $studentDetails->course_id)->get();
        $this->currentQuestion = $this->questions[$this->currentIndex] ?? null;

        $courseTime = optional($studentDetails->course)->test_time;
        $testCountdown = $studentDetails->test_countdown;
        $duration = ($testCountdown && $testCountdown !== '00:00:00')
            ? $testCountdown
            : $courseTime;
        [$this->durationMinutes, $this->durationSeconds] = $this->convertToMinutesAndSeconds($duration);
        $this->totalTestTimeInSeconds = $this->convertToSeconds($courseTime);
        }
    public function startTest()
    {
        $this->testStarted = true;
        $this->user->student_details->update([
            'test_started' => '1'
        ]);

    }
    private function convertToSeconds($time)
    {
        [$hours, $minutes, $seconds] = explode(':', $time);
        return ((int)$hours * 3600) + ((int)$minutes * 60) + (int)$seconds;
    }
    public function setRemainingTime($time)
    {
        $formattedTime =  gmdate('H:i:s', $time);
        $this->user->student_details->update([
            'test_countdown' => $formattedTime
        ]);
    }

    public function render()
    {
        return view('livewire.entry-test');
    }
    private function convertToMinutesAndSeconds($time)
    {
        if (!$time) return [0, 0];

        [$hours, $minutes, $seconds] = explode(':', $time);

        $totalMinutes = ((int) $hours * 60) + (int) $minutes;
        return [$totalMinutes, (int) $seconds];
    }
    public function submitAnswer()
    {
        $this->validate([
            'selectedOption' => 'required'
        ], [
            'selectedOption.required' => 'You must select an option'
        ]);
        if ($this->currentQuestion && $this->selectedOption !== null) {
            $this->saveResult();
            $this->saveTestMark();
        }
        $this->currentIndex++;

        if ($this->currentIndex < $this->questions->count()) {
            $this->selectedOption = null;
            $this->currentQuestion = $this->questions[$this->currentIndex];
        } else {
            session()->flash('message', 'Quiz completed!');
            $this->currentQuestion = null;
        }

        // entry test column will be true as he completes the test
        // student will get a report instantly as he/she submit the test
        // if failed a there a result button will be showed as user clicks on it he will see a modal containing
        // Wrong Answers Correct Answer Total Question
        // as he clicks on exit he will be redirected to login
        // he cant login directly
        // even if student passed the test result will be approved or decide by admin

    }
    public function showResultModal()
    {
        $courseId = $this->user->student_details->course_id;
        $result = Result::where('user_id', $this->user->id)->where('course_id', $courseId)
            ->where('correct_answer', false)
            ->get();
        $test_marks = TestMark::where('student_id', $this->user->id)->where('course_id', $courseId)
            ->first();
        $this->wrongQuestionCount = $test_marks->wrong_ans;
        $this->correctQuestionCount = $test_marks->correct_ans;
        $this->totalQuestionForResult = $test_marks->total_questions;

        $this->results = $result;
        $this->dispatch('show-result');
    }
    protected function saveResult()
    {
        $userId = $this->user->id;
        $courseId = $this->user->student_details->course_id;
        $sessionId = $this->sessionId->id;
        // dd($sessionId);
        $questionId = $this->currentQuestion->id;
        $totalQuestions = $this->questions->count();
        $answer = $this->selectedOption;
        $correctAnswerKey = $this->currentQuestion->correct_answer;
        $isCorrect = ($answer == $correctAnswerKey);
        Result::create([
            'user_id' => $userId,
            'course_id' => $courseId,
            'session_id' => $sessionId,
            'question_id' => $questionId,
            'total_questions' => $totalQuestions,
            'answer' => $answer,
            'correct_answer' => $isCorrect,
        ]);
    }
    protected function saveTestMark()
    {
        $userId = $this->user->id;
        $courseId = $this->user->student_details->course_id;
        $sessionId = $this->sessionId->id; // static for now
        $userSessionId = $this->user->session_year_id;

        $testMark = TestMark::firstOrCreate(
            [
                'student_id' => $userId,
                'course_id' => $courseId,
                'session_id' => $sessionId,
            ],
            [
                'wrong_ans' => 0,
                'correct_ans' => 0,
                'total_questions' => $this->questions->count(),
                'percentage' => '0%',
            ]
        );
        $resultQuery = Result::where('user_id', $userId)
            ->where('course_id', $courseId)
            ->where('session_id', $userSessionId);
        $correct = (clone $resultQuery)->where('correct_answer', true)->count();
        $wrong = (clone $resultQuery)->where('correct_answer', false)->count();

        $percentage = round(($correct / $this->questions->count()) * 100, 2) . '%';

        $testMark->update([
            'correct_ans' => $correct,
            'wrong_ans' => $wrong,
            'percentage' => $percentage,
        ]);
        $questions = Question::where('course_id', $courseId)
            ->where('session_id', $userSessionId)
            ->count();

        $attempted_questions = (clone $resultQuery)->count();
        $getStudentPerformance =   TestMark::where('course_id', $courseId)->where('session_id', $userSessionId)->where('student_id', $userId)->first();
        // Original course Question count === attempted questions
        if ($questions === $attempted_questions) {
            $this->user->student_details->update([
                'entry_test' => '1'
            ]);
            $this->isCompleted = true;
            $this->percentage = $getStudentPerformance->percentage;
        }
    }
    public function exitToLogin()
    {
        User::where('id', $this->user->id)->update([
            'is_active' => '0'
        ]);
        Auth::logout();
        return to_route('login');
    }
}
