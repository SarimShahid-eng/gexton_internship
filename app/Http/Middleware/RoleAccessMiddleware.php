<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        $user = Auth::user();
        if ($user->user_type !== $role) {
            return abort(404);
        }
        //  elseif ($user->user_type === 'student' && $user->student_details->result=='In_progress' && !$user->student_details->entry_test ) {
        // //   dd('its a non passed');
        //     // return to_route('entry_test');
        // } elseif ($user->user_type === 'teacher') {
        //     dd('s');
        //     // return to_route();
        // }
        return $next($request);
    }
}
