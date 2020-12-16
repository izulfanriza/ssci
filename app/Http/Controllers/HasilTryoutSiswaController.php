<?php

namespace App\Http\Controllers;

use App\Models\HasilTryoutSiswa;
use App\Models\Peserta;
use App\Models\Tryout;
use App\Models\User;
use App\Models\Universitas;
use App\Models\Jurusan;
use App\Models\SimulasiTryout;
use Illuminate\Support\Facades\DB;
use Auth;
use Alert;
use Validator;
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
        ->select('tryouts.*', 'pesertas.id as id_peserta', 'pesertas.nama as nama_peserta', 'pesertas.nomor as nomor_peserta', 'pesertas.skor_tka', 'pesertas.rank_tka', 'pesertas.skor_tps', 'pesertas.rank_tps')
        ->where('tryouts.id','=',$hasiltryoutsiswa->id)
        ->where('pesertas.user_id','=',$thisUser->id)
        ->get();
        $peserta = DB::table('pesertas')
        ->select('pesertas.*')
        ->where('pesertas.tryout_kode','=',$tryouts->kode)
        ->where('pesertas.user_id','=',$thisUser->id)
        ->first();
        $simulasis = DB::table('simulasi_tryouts')
        ->join('jurusans','simulasi_tryouts.jurusan_kode','jurusans.kode')
        ->join('universitas','jurusans.universitas_kode','universitas.kode')
        ->select('simulasi_tryouts.*','jurusans.nama as nama_jurusan', 'universitas.nama as nama_universitas')
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

    public function addSimulasi($peserta_id)
    {
        $peserta = Peserta::find($peserta_id);
        $tryout = DB::table('tryouts')
        ->select('tryouts.*')
        ->where('tryouts.kode','=',$peserta->tryout_kode)
        ->get();
        $universitas = Universitas::all();
        return view('hasiltryoutsiswa.create-simulasi',array())
        ->with('peserta',$peserta)
        ->with('tryout',$tryout)
        ->with('universitas',$universitas);
    }

    public function saveSimulasi(Request $request)
    {
        // return "formula perhitungan belum dibuat, silahkan kembali";
        $validator = Validator::make($request->all(), [
            'jurusan' => ['required', 'string', 'max:255'],
            'prioritas' => ['required', 'string', 'max:255',],
        ]);
        if ($validator->fails()) {
            return redirect('hasiltryoutsiswa/'.$request->id_peserta.'/simulasi')
                ->withErrors($validator)
                ->withInput();
        }
        $peserta = Peserta::find($request->id_peserta);
        $jurusan_pilih = DB::table('jurusans')
        ->select('jurusans.*')
        ->where('jurusans.kode','=',$request->jurusan)
        ->first();
        
        $sbmptn6040 = (($peserta->skor_tps*0.6) + ($peserta->skor_tka*0.4))/2;
        // return $sbmptn6040;
        if ($jurusan_pilih->nilai_perhitungan <= $sbmptn6040) {
            $hasil = 'lolos';
        }
        else if ($jurusan_pilih->nilai_perhitungan > $sbmptn6040) {
            $hasil = 'tidaklolos';
        }

        $simulasi = new SimulasiTryout;
        $simulasi->pilihan = $request['prioritas'];
        $simulasi->peserta_id = $request['id_peserta'];
        $simulasi->jurusan_kode = $request['jurusan'];
        $simulasi->hasil = $hasil;
        $simulasi->save();

        Alert::success('Success', 'Berhasil Menambah Data');
        return redirect('hasiltryoutsiswa/'.$request->id_tryout);
    }

    public function findUniversitas(Request $request)
    {
        // return $request;
        $data = Jurusan::select('nama', 'kode')->where('universitas_kode', $request->kode)->where('program_studi_kode', $request->jenis_program_studi)->take(100)->get();
        return response()->json($data);
    }

    public function rekomendasi($simulasi_id)
    {
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
