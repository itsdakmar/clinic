<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Mail\RegisterMail;
use Illuminate\Http\Request;

class DrugController extends Controller
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
        $drugs = Drug::all();
        return view('drugs.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drugs.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Drug::create($request->merge(
            [
                'expired_date' => $request->prefix__date__suffix
            ]
        )->all());

        return redirect()->route('drugs.index')->withStatus(__('Drug successfully registered.'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function findDrug(Request $request){

        $search = $request->search;

        if($search == ''){
            $drugs = Drug::orderby('name','asc')
                ->select('id','name')
                ->limit(10)
                ->get();
        }else{
            $drugs = Drug::orderby('name','asc')
                ->select('id','name')
                ->where('name', 'like', '%' .$search . '%')
                ->limit(10)
                ->get();
        }

        $response = array();
        foreach($drugs as $drug){
            $response[] = array(
                "id"=>$drug->id,
                "text"=>$drug->name
            );
        }

        echo json_encode($response);
        exit;
    }

    public function get(Request $request){
        return Drug::where('id', $request->id)->get()->first();
    }
}
