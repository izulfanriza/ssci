<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Http\Controllers\PerhitunganController;
use App\Models\Simulasi;
use Illuminate\Support\Facades\DB;
use App\Models\Universitas;
use Auth;
use Alert;
use Validator;
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
        $thisUser = Auth::user();
        if ($thisUser->role != 'siswabiasa') { 
            $universitas_a1 = Universitas::all();
            $universitas_a2 = Universitas::all();
            $universitas_o1 = Universitas::all();
            $universitas_o2 = Universitas::all();
            return view('simulasi.create',array())
            ->with('universitas_a1',$universitas_a1)
            ->with('universitas_a2',$universitas_a2)
            ->with('universitas_o1',$universitas_o1)
            ->with('universitas_o2',$universitas_o2);
        }
        if ($thisUser->role == 'siswabiasa') {

            $simulasi = DB::table('simulasi_manuals')
            ->where('simulasi_manuals.user_id','=',$thisUser->id)
            ->get();

            $jmlSimulasi = count($simulasi);

            if ($jmlSimulasi < 6) {
                $universitas_a1 = Universitas::all();
                $universitas_a2 = Universitas::all();
                $universitas_o1 = Universitas::all();
                $universitas_o2 = Universitas::all();
                return view('simulasi.create',array())
                ->with('universitas_a1',$universitas_a1)
                ->with('universitas_a2',$universitas_a2)
                ->with('universitas_o1',$universitas_o1)
                ->with('universitas_o2',$universitas_o2);
            }
            if ($jmlSimulasi >= 6) {
                return view('simulasi.create-max');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thisUser = Auth::user();

        if ($request->program_studi_kode == 'saintek') {
            $validator = Validator::make($request->all(), [
                'program_studi_kode' => ['required', 'string', 'max:255'],
                'matematika' => ['required', 'string', 'max:255',],
                'fisika' => ['required', 'string', 'max:255',],
                'kimia' => ['required', 'string', 'max:255',],
                'biologi' => ['required', 'string', 'max:255',],
                'k_penalaran_umum_saintek' => ['required', 'string', 'max:255',],
                'm_bacaan_dan_menulis_saintek' => ['required', 'string', 'max:255',],
                'peng_dan_pemahaman_umum_saintek' => ['required', 'string', 'max:255',],
                'k_kuantitatif_saintek' => ['required', 'string', 'max:255',],
                'universitas_saintek1' => ['required', 'string', 'max:255',],
                'jurusan_saintek1' => ['required', 'string', 'max:255',],
                'universitas_saintek2' => ['required', 'string', 'max:255',],
                'jurusan_saintek2' => ['required', 'string', 'max:255',],
            ]);
        }
        if ($request->program_studi_kode == 'soshum') {
            $validator = Validator::make($request->all(), [
                'program_studi_kode' => ['required', 'string', 'max:255'],
                'matematika_soshum' => ['required', 'string', 'max:255',],
                'ekonomi' => ['required', 'string', 'max:255',],
                'geografi' => ['required', 'string', 'max:255',],
                'sosiologi' => ['required', 'string', 'max:255',],
                'sejarah' => ['required', 'string', 'max:255',],
                'k_penalaran_umum_soshum' => ['required', 'string', 'max:255',],
                'm_bacaan_dan_menulis_soshum' => ['required', 'string', 'max:255',],
                'peng_dan_pemahaman_umum_soshum' => ['required', 'string', 'max:255',],
                'k_kuantitatif_soshum' => ['required', 'string', 'max:255',],
                'universitas_soshum1' => ['required', 'string', 'max:255',],
                'jurusan_soshum1' => ['required', 'string', 'max:255',],
                'universitas_soshum2' => ['required', 'string', 'max:255',],
                'jurusan_soshum2' => ['required', 'string', 'max:255',],
            ]);
        }
        if ($validator->fails()) {
            return redirect('simulasi/create')
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->jurusan_saintek1) {
            $simulasi = new Simulasi;
            $simulasi->pilihan = '1';
            $simulasi->program_studi = $request['program_studi_kode'];
            $simulasi->matematika = $request['matematika'];
            $simulasi->fisika = $request['fisika'];
            $simulasi->kimia = $request['kimia'];
            $simulasi->biologi = $request['biologi'];
            $simulasi->k_penalaran_umum = $request['k_penalaran_umum_saintek'];
            $simulasi->m_bacaan_menulis = $request['m_bacaan_dan_menulis_saintek'];
            $simulasi->peng_pengetahuan_umum = $request['peng_dan_pemahaman_umum_saintek'];
            $simulasi->k_kuantitatif = $request['k_kuantitatif_saintek'];
            $simulasi->jurusan_kode = $request['jurusan_saintek1'];
            $simulasi->hasil = PerhitunganController::saintek($request);
            $simulasi->user_id = $thisUser->id;
            $simulasi->save();
        }
        if ($request->jurusan_saintek2) {
            $simulasi = new Simulasi;
            $simulasi->pilihan = '2';
            $simulasi->program_studi = $request['program_studi_kode'];
            $simulasi->matematika = $request['matematika'];
            $simulasi->fisika = $request['fisika'];
            $simulasi->kimia = $request['kimia'];
            $simulasi->biologi = $request['biologi'];
            $simulasi->k_penalaran_umum = $request['k_penalaran_umum_saintek'];
            $simulasi->m_bacaan_menulis = $request['m_bacaan_dan_menulis_saintek'];
            $simulasi->peng_pengetahuan_umum = $request['peng_dan_pemahaman_umum_saintek'];
            $simulasi->k_kuantitatif = $request['k_kuantitatif_saintek'];
            $simulasi->jurusan_kode = $request['jurusan_saintek2'];
            $simulasi->hasil = PerhitunganController::saintek();
            $simulasi->user_id = $thisUser->id;
            $simulasi->save();
        }
        if ($request->jurusan_soshum1) {
            $simulasi = new Simulasi;
            $simulasi->pilihan = '1';
            $simulasi->program_studi = $request['program_studi_kode'];
            $simulasi->matematika = $request['matematika_soshum'];
            $simulasi->geografi = $request['geografi'];
            $simulasi->ekonomi = $request['ekonomi'];
            $simulasi->sosiologi = $request['sosiologi'];
            $simulasi->sejarah = $request['sejarah'];
            $simulasi->k_penalaran_umum = $request['k_penalaran_umum_soshum'];
            $simulasi->m_bacaan_menulis = $request['m_bacaan_dan_menulis_soshum'];
            $simulasi->peng_pengetahuan_umum = $request['peng_dan_pemahaman_umum_soshum'];
            $simulasi->k_kuantitatif = $request['k_kuantitatif_soshum'];
            $simulasi->jurusan_kode = $request['jurusan_soshum1'];
            $simulasi->hasil = PerhitunganController::soshum();
            $simulasi->user_id = $thisUser->id;
            $simulasi->save();
        }
        if ($request->jurusan_soshum2) {
            $simulasi = new Simulasi;
            $simulasi->pilihan = '1';
            $simulasi->program_studi = $request['program_studi_kode'];
            $simulasi->matematika = $request['matematika_soshum'];
            $simulasi->geografi = $request['geografi'];
            $simulasi->ekonomi = $request['ekonomi'];
            $simulasi->sosiologi = $request['sosiologi'];
            $simulasi->sejarah = $request['sejarah'];
            $simulasi->k_penalaran_umum = $request['k_penalaran_umum_soshum'];
            $simulasi->m_bacaan_menulis = $request['m_bacaan_dan_menulis_soshum'];
            $simulasi->peng_pengetahuan_umum = $request['peng_dan_pemahaman_umum_soshum'];
            $simulasi->k_kuantitatif = $request['k_kuantitatif_soshum'];
            $simulasi->jurusan_kode = $request['jurusan_soshum2'];
            $simulasi->hasil = PerhitunganController::soshum();
            $simulasi->user_id = $thisUser->id;
            $simulasi->save();
        }

        Alert::success('Success', 'Berhasil Menambah Data');
        return redirect('simulasi');
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
