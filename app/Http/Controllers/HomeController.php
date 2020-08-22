<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if ( Auth::user()->roles->first()->name == 'patient' ) {// do your magic here
            return redirect()->route('patients.show', Auth::id());
        }

        return view('dashboard.dashboardv1');
    }

    public function byServiceYearly(){

        $data = DB::table('appointments')
            ->join('timeslots', 'appointments.id', '=', 'timeslots.appointmentId')
            ->select('appointments.type as type', DB::raw('DATE(timeslots.date) as date'), DB::raw('count(appointments.id) as total'))
            ->groupBy('type','date')
            ->get()
            ->map(function ($el){
                return [
                    'month' => Carbon::parse($el->date)->format('m'),
                    'service' => $el->type,
                    'total' => $el->total
                ];
            });


        $array['kesringan'] = [0,0,0,0,0,0,0,0,0,0,0,0];
        $array['checkup']   = [0,0,0,0,0,0,0,0,0,0,0,0];
        $array['dressing']  = [0,0,0,0,0,0,0,0,0,0,0,0];

        for ($i=0; $i < 12; $i++){

            if(isset($data[$i]['month']) && $data[$i]['service'] == 1){
                $array['kesringan'][(int)$data[$i]['month'] - 1] += $data[$i]['total'];
            }

            if(isset($data[$i]['month']) && $data[$i]['service'] == 2){
                $array['checkup'][(int)$data[$i]['month'] - 1] += $data[$i]['total'];
            }

            if(isset($data[$i]['month']) && $data[$i]['service'] == 3){
                $array['dressing'][(int)$data[$i]['month'] - 1] += $data[$i]['total'];
            }
        }

        return response()->json($array);
    }

    public function mostUsedDrugs(){
        return DB::table('prescriptions')
            ->join('drugs', 'prescriptions.drugId', '=', 'drugs.id')
            ->select('drugs.name', DB::raw('COUNT(prescriptions.id) as total'))
            ->groupBy('drugs.name')
            ->orderBy(DB::raw('COUNT(prescriptions.id)'), 'DESC')
            ->take(5)
            ->get();
    }

    public function lastMonthTotal(){
        return DB::table('appointments')
            ->join('timeslots', 'appointments.id', '=', 'timeslots.appointmentId')
            ->whereMonth('timeslots.date', '=', Carbon::now()->subMonth()->month)
            ->select('timeslots.date',DB::raw('count(appointments.id) as total'))
            ->groupBy('date')
            ->get()
            ->groupBy(function($el) {
                return Carbon::parse($el->date)->format('W');
            });
    }

    public function last20Days(){
        return DB::table('appointments')
            ->join('timeslots', 'timeslots.appointmentId', '=', 'appointments.id')
            ->select('appointments.id','timeslots.date')
            ->orderBy('appointments.id', 'ASC')
            ->take(10)
            ->get();
    }
}
