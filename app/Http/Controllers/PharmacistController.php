<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use App\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class PharmacistController extends Controller
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
        $pharmacists = User::role('pharmacist')->get();
        return view('pharmacists.index', compact('pharmacists'));
    }

    /**
     * Show create patient view.
     *
     * @return Renderable
     */
    public function create()
    {
        return view('pharmacists.create');
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

        $user->assignRole('pharmacist');

        Mail::to($request->email)->send(new WelcomeMail([
                'name' => $request->firstName.' '.$request->lastName,
                'password' => $password
            ]

        ));

        return redirect()->route('pharmacists.index')->withStatus(__('Doctor information successfully created.'));
    }

    public function edit($pharmacistId)
    {
        return view('pharmacists.update', [
            'pharmacist' => User::findOrFail($pharmacistId)
        ]);
    }

    public function update(Request $request, $pharmacistId)
    {
        $patient = User::findOrFail($pharmacistId);
        $patient->update($request->all());

        return redirect()->route('pharmacists.index')->withStatus(__('Doctor information successfully updated.'));
    }

    public function destroy($userId)
    {
        return User::destroy($userId);
    }
}
