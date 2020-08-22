<?php

namespace App\Http\Controllers;

use App\City;
use App\Http\Requests\RegisterRequest;
use App\Mail\RegisterMail;
use App\State;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register_patient', ['states' => $this->getStateCity()->states, 'cities' => $this->getStateCity()->cities]);
    }

    private function getStateCity()
    {
        $data = array(
            'states' => State::all(),
            'cities' => City::all()
        );

        return (object)$data;
    }

    public function store(RegisterRequest $request){

        $user = User::create($request->merge(['password' => Hash::make($request->password)])->all());

        $user->assignRole('patient');

        Mail::to($request->email)->send(new RegisterMail([
            'name' => $request->firstName.' '.$request->lastName,
            'url' => route('patients.verify', $user->id)
        ]));

        return redirect('/login')->withStatus(__('Patient information successfully registered. Please check email for verification'));
    }


    public function verify($patientId){
       $patient =  User::findOrFail($patientId);
       $patient->update([
           'active' => 1
       ]);

        return redirect('/login')->withStatus(__('Successfully verified. You may login now.'));

    }
}
