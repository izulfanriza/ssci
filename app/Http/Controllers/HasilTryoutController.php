<?php

namespace App\Http\Controllers;

use App\Models\HasilTryout;
use Illuminate\Http\Request;

class HasilTryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hasiltryout.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilTryout  $hasilTryout
     * @return \Illuminate\Http\Response
     */
    public function show(HasilTryout $hasilTryout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilTryout  $hasilTryout
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilTryout $hasilTryout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilTryout  $hasilTryout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilTryout $hasilTryout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilTryout  $hasilTryout
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilTryout $hasilTryout)
    {
        //
    }
}
