<?php

namespace App\Http\Controllers;

use App\Models\Cluster;

use App\Models\Simulasi;
use Illuminate\Support\Facades\DB;
use App\Models\Universitas;
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
        $universitas = Universitas::all();
        return view('simulasi.create',array())
        ->with('universitas',$universitas);
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

    public function rekomendasi($simulasi_id)
    {
        $thisUser = Auth::user();
        if ($thisUser->role == 'siswabiasa') {
            return redirect('upgrade');
        }
        elseif ($thisUser->role == 'siswapremium') {
            return "Siswa Premium";
            $simulasi = SimulasiTryout::find($simulasi_id);
            $simulasis = DB::table('simulasi_tryouts')
            ->join('jurusans','simulasi_tryouts.jurusan_kode','jurusans.kode')
            ->join('universitas','jurusans.universitas_kode','universitas.kode')
            ->select('simulasi_tryouts.*','jurusans.nama as nama_jurusan', 'universitas.nama as nama_universitas')
            ->where('simulasi_tryouts.id','=',$simulasi_id)
            ->get();
            $jurusan = DB::table('jurusans')
            ->join('universitas','jurusans.universitas_kode','universitas.kode')
            ->select('jurusans.*', 'universitas.nama as nama_universitas')
            ->where('jurusans.kode','=',$simulasi->jurusan_kode)
            ->first();
            $peserta = Peserta::find($simulasi->peserta_id);
            $sbmptn6040 = (($peserta->skor_tps*0.6) + ($peserta->skor_tka*0.4))/2;
            $tryout = DB::table('tryouts')
            ->join('pesertas','tryouts.kode','pesertas.tryout_kode')
            ->select('tryouts.*', 'pesertas.id as id_peserta', 'pesertas.nama as nama_peserta', 'pesertas.nomor as nomor_peserta', 'pesertas.skor_tka', 'pesertas.rank_tka', 'pesertas.skor_tps', 'pesertas.rank_tps')
            ->where('pesertas.id','=',$simulasi->peserta_id)
            ->get();
            $rekomendasis = DB::table('jurusans')
            ->join('universitas','jurusans.universitas_kode','universitas.kode')
            ->select('jurusans.prioritas', 'jurusans.nama as nama_jurusan', 'universitas.nama as nama_universitas')
            ->where('jurusans.nilai_perhitungan','<=',$sbmptn6040)
            ->where('jurusans.cluster_kode','=',$jurusan->cluster_kode)
            ->where('jurusans.program_studi_kode','=',$jurusan->program_studi_kode)
            ->where('jurusans.prioritas','=',$jurusan->prioritas)
            ->get();

            return view('hasiltryoutsiswa.rekomendasi',array())
            ->with('tryout',$tryout)
            ->with('simulasi',$simulasi)
            ->with('simulasis',$simulasis)
            ->with('rekomendasis',$rekomendasis);
        }
    }
}
