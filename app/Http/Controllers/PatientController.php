<?php

namespace App\Http\Controllers;

use App\City;
use App\Mail\WelcomeMail;
use App\State;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
    public function index()
    {
        $patients = User::role('patient')->with('patientDetail')->get();
        return view('patients.index', compact('patients'));
    }

    /**
     * Show create patient view.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('patients.create', ['states' => $this->getStateCity()->states, 'cities' => $this->getStateCity()->cities]);
    }

    /**
     * Store patient information to database.
     *
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $password = Str::random(10);
        $user = User::create($request->merge([
            'password' => Hash::make($password),
            'matricStaffId' => ($request->StaffId !== NULL) ? $request->StaffId : $request->matricId
        ])->all());

        $user->patientDetail()->create($request->merge([
            'dob' => Carbon::CreateFromFormat('d/m/Y', $request->dob)->format('Y-m-d H:i:s')
        ])->all());

        $user->assignRole('patient');

        Mail::to($request->email)->send(new WelcomeMail([
                'name' => $request->firstName.' '.$request->lastName,
                'password' => $password
            ]

        ));

        return redirect()->route('patients.index')->withStatus(__('Patient information successfully created.'));

    }

    public function edit($patientId)
    {
        return view('patients.update', [
            'patient' => User::with('patientDetail')->findOrFail($patientId),
            'states' => $this->getStateCity()->states,
            'cities' => $this->getStateCity()->cities
        ]);
    }

    public function update(Request $request, $patientId)
    {
        $patient = User::with('patientDetail')->findOrFail($patientId);
        $patient->update($request->all());
        $patient->patientDetail()->update($request->merge([
            'dob' => Carbon::CreateFromFormat('d/m/Y', $request->dob)->format('Y-m-d H:i:s')
        ])->only(['sex', 'race', 'dob', 'weight', 'height', 'bloodGroup', 'phone', 'address_1', 'address_2', 'cityId', 'stateId', 'postcode']));

        return redirect()->route('patients.index')->withStatus(__('Patient information successfully updated.'));
    }

    public function destroy($userId)
    {
        return User::destroy($userId);
    }

    private function getStateCity()
    {
        $data = array(
            'states' => State::all(),
            'cities' => City::all()
        );

        return (object)$data;
    }
}
