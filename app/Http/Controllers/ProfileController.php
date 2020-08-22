<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
        $profile = User::with('patientDetail')->findOrFail(Auth::id());
        return view('profile.index', compact('profile'));
    }
}
