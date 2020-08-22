<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class PatientDetail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->roles->first()->name == 'patient') {
            $patient = User::with('patientDetail')->find(Auth::id());
            if(!$patient->patientDetail){
                return redirect()->route('update.patient', Auth::id())->with('status', 'Please update your information first before able to using clinic services');
            }
        }

        return $next($request);
    }
}
