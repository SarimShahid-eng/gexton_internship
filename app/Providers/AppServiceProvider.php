<?php

namespace App\Providers;

use Livewire\Livewire;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Blade::if('role', function ($role) {
            return Auth::user()->hasRole($role);
        });
        Blade::if('studentPassed', function () {
            $user = auth()->user();
            return $user
                && $user->user_type === 'student'
                && $user->student_details
                && $user->student_details->result === 'pass';
        });
        // For students who are in progress
        Blade::if('studentInProgress', function () {
            $user = auth()->user();
            return $user
                && $user->user_type === 'student'
                && $user->student_details
                && $user->student_details->result === 'In_progress';
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::setScriptRoute(function ($handle) {
            return Route::get('/custom/livewire/livewire.js', $handle);
        });
    }
}
