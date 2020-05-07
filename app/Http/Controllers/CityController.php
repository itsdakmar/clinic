<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class CityController extends Controller
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
     * get list of cities by chosen state.
     *
     * @param Request $request
     *
     * @return City
     */
    public function getCities(Request $request){
        $stateId = $request->stateId;
        return City::where('stateId', $stateId)->get();
    }
}
