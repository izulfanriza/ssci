<?php

namespace App\Http\Controllers;

use App\Models\Cluster;

use App\Models\Simulasi;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Http\Request;

class SimulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thisUser = Auth::user();
        $simulasis = DB::table('simulasi_manuals')
        ->join('jurusans','simulasi_manuals.jurusan_kode','jurusans.kode')
        ->join('universitas','jurusans.universitas_kode','universitas.kode')
        ->select('simulasi_manuals.*','jurusans.nama as nama_jurusan', 'universitas.nama as nama_universitas')
        ->where('simulasi_manuals.user_id','=',$thisUser->id)
        ->get();

        return view('simulasi.index',array())
        ->with('simulasis',$simulasis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('simulasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function show(Simulasi $simulasis)
    {
        return view('simulasi.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Simulasi $simulasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Simulasi $simulasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simulasi  $simulasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simulasi $simulasi)
    {
        //
    }
}
