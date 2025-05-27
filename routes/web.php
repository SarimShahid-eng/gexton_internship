<?php

use Livewire\Livewire;
use App\Livewire\Group;
use App\Livewire\Teacher;
use App\Livewire\Question;
use App\Livewire\Dashboard;
use App\Livewire\EntryTest;
use App\Livewire\EditProfile;
use App\Livewire\CreateResult;
use App\Livewire\CreateCourses;
use App\Livewire\CreateStudent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire-alpine-bootstrap/public/livewire/update', $handle);
});
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->group(function () {
        Route::get('/dashboard', Dashboard::class)->name('dashboard');
        Route::get('show-courses', CreateCourses::class)->name('courses_create');
        Route::get('/show-teachers', Teacher::class)->name('show_teachers');
        Route::get('show-student', CreateStudent::class)->name('student_create');
        Route::get('/show-group', Group::class)->name('show_batch');
        Route::get('/show-questions', Question::class)->name('show_questions');
        Route::get('/show-result', CreateResult::class)->name('show_result');
    });
    // students didvided into two categ pass or In_progress(who are attempting)

    Route::middleware(['role:student', 'In_progress'])->group(function () {
        Route::get('/entry-test', EntryTest::class)->name('entry_test');
    });

    Route::get('/profile', EditProfile::class)->name('show_profile');
});
Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('login_attemept', 'authenticate')
        // login request 5 times in 1 minute per ip
        // user can request only 5 times to login attempt in 1 minute then he will try after a minute
        ->middleware('throttle:5,1')
        ->name('login.attempt');
    Route::post('/logout', 'logout')->name('logout');
});
