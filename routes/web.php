<?php

use App\Livewire\Group;
use App\Livewire\Question;
use App\Livewire\Teacher;
use Livewire\Livewire;
use App\Livewire\Dashboard;
use App\Livewire\CreatePost;
use App\Livewire\CreateCourses;
use Illuminate\Support\Facades\Route;



Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/gexton_internship/public/livewire/update', $handle);
});
Route::get('create-courses', CreateCourses::class)->name('courses_create');
Route::get('/dashboard', Dashboard::class)->name('dashboard');
Route::get('/show-teachers', Teacher::class)->name('show_employees');
Route::get('/show-group', Group::class)->name('show_batch');
Route::get('/show-questions', Question::class)->name('show_batch');
