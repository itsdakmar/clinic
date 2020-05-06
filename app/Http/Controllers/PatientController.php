<?php

namespace App\Http\Controllers;

use App\City;
use App\PatientDetails;
use App\State;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show List of patient view.
     *
     * @return Renderable
     */
    public function index(){
        $patients = User::role('patient')->get();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show create patient view.
     *
     * @return Renderable
     */
    public function create(){
        $states = State::all();
        $cities = City::all();
        return view('patients.create', compact('states','cities'));
    }

    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }

    public function destroy(){

    }
}
