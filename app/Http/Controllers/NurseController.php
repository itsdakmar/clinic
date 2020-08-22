<?php

namespace App\Http\Controllers;

use App\Http\Requests\BasicUserRequest;
use App\Mail\WelcomeMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NurseController extends Controller
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
        $nurses = User::role('nurse')->get();
        return view('nurses.index', compact('nurses'));
    }

    /**
     * Show create patient view.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('nurses.create');
    }

    /**
     * Store patient information to database.
     *
     * @param Request $request
     * @return Renderable
     */
    public function store(BasicUserRequest $request)
    {
        $password = Str::random(10);
        $user = User::create($request->merge([
            'active' => 1,
            'password' => Hash::make($password)
        ])->all());

        $user->assignRole('nurse');

        Mail::to($request->email)->send(new WelcomeMail([
                'name' => $request->firstName.' '.$request->lastName,
                'password' => $password
            ]

        ));

        return redirect()->route('nurses.index')->withStatus(__('Nurse information successfully created.'));
    }

    public function edit($doctorId)
    {
        return view('nurses.update', [
            'nurse' => User::findOrFail($doctorId)
        ]);
    }

    public function update(Request $request, $doctorId)
    {
        $patient = User::findOrFail($doctorId);
        $patient->update($request->all());

        return redirect()->route('nurses.index')->withStatus(__('Nurse information successfully updated.'));
    }

    public function destroy($userId)
    {
        return User::destroy($userId);
    }
}
