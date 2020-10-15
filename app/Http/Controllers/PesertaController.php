<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Imports\PesertaImport;
use Excel;
use Response;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tryout.upload-peserta');
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

    public function upload($tryout_id)
    {
        $tryout = Tryout::find($tryout_id);

        return view('tryout.upload-peserta',array())
        ->with('tryout',$tryout);
    }
    public function goUpload(Request $request)
    {
        // gimana caranya membawa variable tryout ini ke file App\Imports\PesertaImport
        $tryout = Tryout::find($request->id);
        if ($request->hasFile('file_peserta')) {
            $file = $request->file('file_peserta');
            // cara parsing parameternya gimana?
            Excel::import(new PesertaImport, $file);
            return "Import";
        }
        return "Gagal";
    }
}
