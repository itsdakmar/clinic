<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use App\Timeslot;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('appointments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $time = explode(':',$request->prefix__time__suffix);

        $appointment = Appointment::create([
            'patientId' => $request->patientId,
            'doctorId' => $request->doctorId,
            'type' => $request->type,
            'status' => (Auth::user()->roles->first()->name == 'patient') ? Appointment::CREATED :Appointment::CONFIRMED,
        ]);

        Timeslot::create([
            'appointmentId' => $appointment->id,
            'date' => $request->prefix__date__suffix,
            'hour' => $time[0],
            'minute' => $time[1],
        ]);


        if(Auth::user()->roles->first()->name == 'patient'){
            return redirect()->route('appointments.upcoming')->withStatus(__('Appointment successfully created.'));
        }else {
            return redirect()->route('appointments.index')->withStatus(__('Appointment successfully created.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);

        return view('appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function check(Request $request)
    {
        if (!$request->date) {
            return false;
        }

        $timeslots = Timeslot::where('date', $request->date)->get();

        $data = [
            [13, 0],
            [13, 15],
            [13, 30],
            [13, 45]
        ];

        foreach ($timeslots as $timeslot) {
            array_push($data, [$timeslot->hour, $timeslot->minute]);
        }

        return json_encode($data);
    }

    public function all()
    {
        return Appointment::with(['user','timeslots'])->get()->map(function($appointment, $key) {

            $end = new Carbon($appointment->timeslots->date->format('Y-m-d').' '.$appointment->timeslots->hour.':'.$appointment->timeslots->minute.':00');

            return [
                'id' => $appointment->id,
                'title' => 'APPOINTMENT WITH PATIENT '. $appointment->user->fullName,
                'start' => new Carbon($appointment->timeslots->date->format('Y-m-d').' '.$appointment->timeslots->hour.':'.$appointment->timeslots->minute.':00'),
                'end' => $end->addMinutes(15),
                'color' => ($key % 2 == 0) ? '#3788d8' : '#60c2c9',
                'url' => route('appointments.show', $appointment->id)

            ];

        })->toJson();
    }

    public function today(){

        if(Auth::user()->roles->first()->name == 'doctor'){
            $appointments = Appointment::with(['user'])
                ->where('status', 3)
                ->whereHas('timeslots', function ($q){
                    $q->where('date', date('Y-m-d'));
                })
                ->get()
                ->map(function($appointment, $key) {

                    $end = new Carbon($appointment->timeslots->date->format('Y-m-d').' '.$appointment->timeslots->hour.':'.$appointment->timeslots->minute.':00');

                    return [
                        'id' => $appointment->id,
                        'title' => 'APPOINTMENT WITH PATIENT '. $appointment->user->fullName.' - '.$appointment->user->matricStaffId,
                        'status' => $appointment->status,
                        'statusBadge' => $appointment->statusBadge,
                        'start' => new Carbon($appointment->timeslots->date->format('Y-m-d').' '.$appointment->timeslots->hour.':'.$appointment->timeslots->minute.':00'),
                        'end' => $end->addMinutes(15),
                        'color' => ($key % 2 == 0) ? '#3788d8' : '#60c2c9',
                        'url' => route('appointments.show', $appointment->id)
                    ];

                })->toBase();
        }else {
            $appointments = Appointment::with(['user'])
                ->whereHas('timeslots', function ($q){
                    $q->where('date', date('Y-m-d'));
                })
                ->get()
                ->map(function($appointment, $key) {

                    $end = new Carbon($appointment->timeslots->date->format('Y-m-d').' '.$appointment->timeslots->hour.':'.$appointment->timeslots->minute.':00');

                    return [
                        'id' => $appointment->id,
                        'title' => 'APPOINTMENT WITH PATIENT '. $appointment->user->fullName.' - '.$appointment->user->matricStaffId,
                        'status' => $appointment->status,
                        'statusBadge' => $appointment->statusBadge,
                        'start' => new Carbon($appointment->timeslots->date->format('Y-m-d').' '.$appointment->timeslots->hour.':'.$appointment->timeslots->minute.':00'),
                        'end' => $end->addMinutes(15),
                        'color' => ($key % 2 == 0) ? '#3788d8' : '#60c2c9',
                        'url' => route('appointments.show', $appointment->id)
                    ];

                })->toBase();
        }

        return view('appointments.list', compact('appointments'));
    }

    public function listView(){

        if(Auth::user()->roles->first()->name == 'doctor') {
            $appointments = Appointment::with(['user'])
                ->get()
                ->whereIn('status', [2,3,4,5])
                ->map(function ($appointment, $key) {

                    $end = new Carbon($appointment->timeslots->date->format('Y-m-d') . ' ' . $appointment->timeslots->hour . ':' . $appointment->timeslots->minute . ':00');

                    return [
                        'id' => $appointment->id,
                        'title' => 'APPOINTMENT WITH PATIENT ' . $appointment->user->fullName,
                        'status' => $appointment->status,
                        'statusBadge' => $appointment->statusBadge,
                        'start' => new Carbon($appointment->timeslots->date->format('Y-m-d') . ' ' . $appointment->timeslots->hour . ':' . $appointment->timeslots->minute . ':00'),
                        'end' => $end->addMinutes(15),
                        'color' => ($key % 2 == 0) ? '#3788d8' : '#60c2c9',
                        'url' => route('appointments.show', $appointment->id)
                    ];

                })->toBase();
        }else {
            $appointments = Appointment::with(['user'])
                ->get()
                ->map(function ($appointment, $key) {

                    $end = new Carbon($appointment->timeslots->date->format('Y-m-d') . ' ' . $appointment->timeslots->hour . ':' . $appointment->timeslots->minute . ':00');

                    return [
                        'id' => $appointment->id,
                        'title' => 'APPOINTMENT WITH PATIENT ' . $appointment->user->fullName,
                        'status' => $appointment->status,
                        'statusBadge' => $appointment->statusBadge,
                        'start' => new Carbon($appointment->timeslots->date->format('Y-m-d') . ' ' . $appointment->timeslots->hour . ':' . $appointment->timeslots->minute . ':00'),
                        'end' => $end->addMinutes(15),
                        'color' => ($key % 2 == 0) ? '#3788d8' : '#60c2c9',
                        'url' => route('appointments.show', $appointment->id)
                    ];

                })->toBase();
        }

        return view('appointments.upcoming', compact('appointments'));
    }

    public function listViewCustomer(){
        $appointments = Appointment::with(['user'])
            ->where('patientId', Auth::user()->id)
            ->whereNotIn('status' , [3,4,5,6])
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

        return view('appointments.upcoming', compact('appointments'));
    }

    public function listViewHistoryCustomer(){
        $appointments = Appointment::with(['user'])
            ->where('patientId', Auth::user()->id)
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

        return view('appointments.history', compact('appointments'));
    }

    public function confirmed(Request $request, $appointmentId){

        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->update(['status' => Appointment::CONFIRMED]);

       return 'success';
    }

    public function canceled(Request $request, $appointmentId){

        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->update(['status' => Appointment::CANCELED]);

        return 'success';
    }

    public function ongoing(Request $request, $appointmentId){

        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->update(['status' => Appointment::ONGOING]);

        return 'success';
    }

    public function resolved(Request $request, $appointmentId){

        $appointment = Appointment::findOrFail($appointmentId);
        $appointment->update(['status' => Appointment::RESOLVED]);

        return 'success';
    }
}
