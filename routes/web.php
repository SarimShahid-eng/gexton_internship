<?php

use Livewire\Livewire;
use App\Livewire\Dashboard;
use App\Livewire\CreateCourses;
use App\Livewire\CreateCustomer;
use App\Http\Livewire\ContactManager;
use Illuminate\Support\Facades\Route;



Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/livewire-alpine-bootstrap/public/livewire/update', $handle);
});
Route::get('create-courses', CreateCourses::class)->name('courses_create');
Route::get('/dashboard', Dashboard::class)->name('dashboard');

