<?php

namespace App\Http\Controllers;

use App\Models\HasilTryoutSiswa;
use Illuminate\Http\Request;

class HasilTryoutSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hasiltryoutsiswa.index');
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
     * @param  \App\Models\HasilTryoutSiswa  $hasilTryoutSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(HasilTryoutSiswa $hasilTryoutSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilTryoutSiswa  $hasilTryoutSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilTryoutSiswa $hasilTryoutSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HasilTryoutSiswa  $hasilTryoutSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HasilTryoutSiswa $hasilTryoutSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HasilTryoutSiswa  $hasilTryoutSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(HasilTryoutSiswa $hasilTryoutSiswa)
    {
        //
    }
}
