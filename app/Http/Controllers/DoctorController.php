<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class DoctorController extends Controller
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
     * @return View
     */
    public function index()
    {
        $doctors = User::role('doctor')->get();
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show create patient view.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('doctors.create');
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
            'active' => 1,
            'password' => Hash::make($password)
        ])->all());

        $user->assignRole('doctor');

        Mail::to($request->email)->send(new WelcomeMail([
                'name' => $request->firstName.' '.$request->lastName,
                'password' => $password
            ]

        ));

        return redirect()->route('doctors.index')->withStatus(__('Doctor information successfully created.'));
    }

    public function edit($doctorId)
    {
        return view('doctors.update', [
            'doctor' => User::findOrFail($doctorId)
        ]);
    }

    public function update(Request $request, $doctorId)
    {
        $patient = User::findOrFail($doctorId);
        $patient->update($request->all());

        return redirect()->route('doctors.index')->withStatus(__('Doctor information successfully updated.'));
    }

    public function destroy($userId)
    {
        return User::destroy($userId);
    }

    public function findDoctor(Request $request){

        $search = $request->search;

        if($search == ''){
            $doctors = User::orderby('firstName','asc')
                ->role('doctor')
                ->select('id','firstName','lastName','matricStaffId')
                ->limit(10)
                ->get();
        }else{
            $doctors = User::orderby('firstName','asc')
                ->role('doctor')
                ->select('id','firstName','lastName','matricStaffId')
                ->where('firstName', 'like', '%' .$search . '%')
                ->orWhere('lastName', 'like', '%' .$search . '%')
                ->orWhere('matricStaffId', 'like', '%' .$search . '%')
                ->limit(10)
                ->get();
        }

        $response = array();
        foreach($doctors as $doctor){
            $response[] = array(
                "id"=>$doctor->id,
                "text"=>$doctor->firstName.' '.$doctor->lastName.' ( '.$doctor->matricStaffId.' )'
            );
        }

        echo json_encode($response);
        exit;
    }

}
