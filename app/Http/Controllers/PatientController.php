<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\City;
use App\Http\Requests\PatientRequest;
use App\Mail\WelcomeMail;
use App\State;
use App\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $patients = User::role('patient')->where('active', 1)->get();

        return view('patients.index', compact('patients'));
    }

    public function profile(){
        return view('others.user-profile');
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
    public function store(PatientRequest $request)
    {
        $password = Str::random(10);
        $user = User::create($request->merge([
            'password' => Hash::make($password),
            'active' => 1,
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

    public function show($patientId){
        $profile = User::with('patientDetail')->where('id', $patientId)->get()->first();
        $appointments = Appointment::with(['user'])
            ->where('patientId', $patientId)
            ->where('status' , 5)
            ->get()
            ->map(function($appointment, $key) {

                $end = new Carbon($appointment->timeslots->date->format('Y-m-d').' '.$appointment->timeslots->hour.':'.$appointment->timeslots->minute.':00');

                return [
                    'id' => $appointment->id,
                    'title' => 'APPOINTMENT WITH PATIENT '. $appointment->user->fullName,
                    'status' => $appointment->status,
                    'statusBadge' => $appointment->statusBadge,
                    'start' => new Carbon($appointment->timeslots->date->format('Y-m-d').' '.$appointment->timeslots->hour.':'.$appointment->timeslots->minute.':00'),
                    'end' => $end->addMinutes(15),
                    'color' => ($key % 2 == 0) ? '#3788d8' : '#60c2c9',
                    'url' => route('appointments.show', $appointment->id)
                ];

            })->toBase();
        return view('profile.index', compact('profile','appointments'));
    }

    public function edit($patientId)
    {
        return view('patients.update', [
            'patient' => User::with('patientDetail')->findOrFail($patientId),
            'states' => $this->getStateCity()->states,
            'cities' => $this->getStateCity()->cities
        ]);
    }

    public function patientDetailUpdate($patientId){
        return view('patients.update2', [
            'patient' => User::with('patientDetail')->findOrFail($patientId),
            'states' => $this->getStateCity()->states,
            'cities' => $this->getStateCity()->cities
        ]);
    }


    public function update(Request $request, $patientId)
    {
        $patient = User::with('patientDetail')->findOrFail($patientId);
        $patient->update($request->all());

        if(!$patient->patientDetail){
            $patient->patientDetail()->create($request->merge([
                'dob' => Carbon::CreateFromFormat('d/m/Y', $request->dob)->format('Y-m-d H:i:s')
            ])->only(['sex', 'race', 'dob', 'weight', 'height', 'bloodGroup', 'phone', 'address_1', 'address_2', 'cityId', 'stateId', 'postcode']));
        }else {
            $patient->patientDetail()->update($request->merge([
                'dob' => Carbon::CreateFromFormat('d/m/Y', $request->dob)->format('Y-m-d H:i:s')
            ])->only(['sex', 'race', 'dob', 'weight', 'height', 'bloodGroup', 'phone', 'address_1', 'address_2', 'cityId', 'stateId', 'postcode']));

        }

        if(Auth::user()->roles->first()->name == 'patient'){
            return redirect()->route('patients.show', $patientId)->withStatus(__('Your information successfully updated.'));
        }else {
            return redirect()->route('patients.index')->withStatus(__('Patient information successfully updated.'));

        }
    }

    public function destroy($userId)
    {
        $checking = Appointment::where('patientId', $userId)->get()->count();
        if($checking > 0){
            return 'false';
        }

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

    public function findPatient(Request $request){

        $search = $request->search;

        if($search == ''){
            $patients = User::orderby('firstName','asc')
                ->role('patient')
                ->select('id','firstName','lastName','matricStaffId')
                ->limit(10)
                ->get();
        }else{
            $patients = User::orderby('firstName','asc')
                ->role('patient')
                ->select('id','firstName','lastName','matricStaffId')
                ->where('firstName', 'like', '%' .$search . '%')
                ->orWhere('lastName', 'like', '%' .$search . '%')
                ->orWhere('matricStaffId', 'like', '%' .$search . '%')
                ->limit(10)
                ->get();
        }

        $response = array();
        foreach($patients as $patient){
            $response[] = array(
                "id"=>$patient->id,
                "text"=>$patient->firstName.' '.$patient->lastName.' ( '.$patient->matricStaffId.' )'
            );
        }

        echo json_encode($response);
        exit;
    }
}
