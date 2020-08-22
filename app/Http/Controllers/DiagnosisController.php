<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Drug;
use App\Prescription;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
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

    public function create($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        return view('diagnosis.create', compact('appointment'));
    }

    public function prescription(Request $request, $appointmentIdd){

        $appointment = Appointment::findOrFail($appointmentIdd);

        $appointment->update([
            'temperature' => $request->temperature,
            'bloodPressure' => $request->bp,
            'respiratoryRate' => $request->rr,
            'remark' => $request->description,
            'status' => Appointment::EXAMINED
        ]);

        foreach ($request->drugId as $key => $drug){
            Prescription::create([
                'appointmentId' => $appointment->id,
                'quantityUsed' => $request->quantity[$key],
                'drugId' => $drug,
            ]);

            $drugDetail = Drug::find($drug)->get()->first();
            $drugDetail->update([
                'quantity' => $drugDetail->quantity - $request->quantity[$key]
            ]);
        }

        return redirect()->route('appointments.show', $appointmentIdd)->withStatus(__('Appointment successfully diagnosed.'));

    }
}
