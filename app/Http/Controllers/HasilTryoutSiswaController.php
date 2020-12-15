<?php

namespace App\Http\Controllers;

use App\Models\HasilTryoutSiswa;
use App\Models\Peserta;
use App\Models\Tryout;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;
use Alert;
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
        $thisUser = Auth::user();
        $user = User::find($thisUser->id);
        $tryouts = DB::table('tryouts')
        ->join('pesertas','tryouts.kode','pesertas.tryout_kode')
        ->select('tryouts.*')
        ->where('pesertas.user_id','=',$user->id)
        ->get();

        return view('hasiltryoutsiswa.index',array())
        ->with('tryouts',$tryouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hasiltryoutsiswa.create');
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
        $thisUser = Auth::user();

        $peserta = Peserta::find($request->id);
        $peserta->user_id = $thisUser->id;
        $peserta->save();
        Alert::success('Success', 'Berhasil Sinkronkan Data');
        return redirect('hasiltryoutsiswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HasilTryoutSiswa  $hasilTryoutSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Tryout $hasiltryoutsiswa)
    {
        $thisUser = Auth::user();
        $tryouts = Tryout::find($hasiltryoutsiswa->id);
        $tryout = DB::table('tryouts')
        ->join('pesertas','tryouts.kode','pesertas.tryout_kode')
        ->select('tryouts.*','pesertas.nama as nama_peserta', 'pesertas.nomor as nomor_peserta', 'pesertas.skor_tka', 'pesertas.rank_tka', 'pesertas.skor_tps', 'pesertas.rank_tps')
        ->where('tryouts.id','=',$hasiltryoutsiswa->id)
        ->where('pesertas.user_id','=',$thisUser->id)
        ->get();
        $peserta = DB::table('pesertas')
        ->select('pesertas.*')
        ->where('pesertas.tryout_kode','=',$tryouts->kode)
        ->where('pesertas.user_id','=',$thisUser->id)
        ->first();
        $simulasis = DB::table('simulasi_tryouts')
        ->select('simulasi_tryouts.*')
        ->where('simulasi_tryouts.peserta_id','=',$peserta->id)
        ->get();
        // return $simulasis;

        return view('hasiltryoutsiswa.show',array())
        ->with('tryout',$tryout)
        ->with('simulasis',$simulasis);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HasilTryoutSiswa  $hasilTryoutSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(HasilTryoutSiswa $hasilTryoutSiswa)
    {
        $hasilTryoutSiswa = Peserta::find($hasilTryoutSiswa->id);
        return $hasilTryoutSiswa;
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

    public function cari()
    {
        return view('hasiltryoutsiswa.cari');
    }

    public function goCari(Request $request)
    {
        $tryout = DB::table('tryouts')
        ->select('tryouts.*')
        ->where('tryouts.kode','=',$request->tryout_kode)
        ->get();

        $peserta = DB::table('pesertas')
        ->join('tryouts','pesertas.tryout_kode','tryouts.kode')
        ->select('pesertas.*')
        ->where('tryouts.kode','=',$request->tryout_kode)
        ->where('pesertas.nomor','=',$request->nomor)
        ->get();

        // return $tryout;
        return view('hasiltryoutsiswa.create',array())
        ->with('tryout',$tryout)
        ->with('peserta',$peserta);
    }
}
