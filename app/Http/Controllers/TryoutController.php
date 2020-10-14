<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use Alert;

class TryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tryouts = Tryout::all();

        return view('tryout.index',array())
        ->with('tryouts',$tryouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tryout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = date('Y-m-d', strtotime($request->tanggal));
        $pukul = date("H:i", strtotime($request->pukul));
        return $tanggal.' '.$pukul;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function show(Tryout $tryout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function edit(Tryout $tryout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tryout $tryout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tryout $tryout)
    {
        //
    }
}
