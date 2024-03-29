<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Http\Controllers\PerhitunganController;
use App\Models\Simulasi;
use App\Models\SaranManual;
use Illuminate\Support\Facades\DB;
use App\Models\Universitas;
use App\Models\User;
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
        ->orderBy('simulasi_manuals.id','asc')
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
                'k_penalaran_umum_saintek' => ['required', 'string', 'max:255'],
                'm_bacaan_dan_menulis_saintek' => ['required', 'string', 'max:255'],
                'peng_dan_pemahaman_umum_saintek' => ['required', 'string', 'max:255'],
                'k_kuantitatif_saintek' => ['required', 'string', 'max:255'],
                'universitas_saintek1' => ['required', 'string', 'max:255'],
                'jurusan_saintek1' => ['required', 'string', 'max:255','different:jurusan_saintek2'],
                'universitas_saintek2' => ['required', 'string', 'max:255'],
                'jurusan_saintek2' => ['required', 'string', 'max:255','different:jurusan_saintek1'],
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
                'k_penalaran_umum_soshum' => ['required', 'string', 'max:255'],
                'm_bacaan_dan_menulis_soshum' => ['required', 'string', 'max:255'],
                'peng_dan_pemahaman_umum_soshum' => ['required', 'string', 'max:255'],
                'k_kuantitatif_soshum' => ['required', 'string', 'max:255'],
                'universitas_soshum1' => ['required', 'string', 'max:255'],
                'jurusan_soshum1' => ['required', 'string', 'max:255','different:jurusan_soshum2'],
                'universitas_soshum2' => ['required', 'string', 'max:255'],
                'jurusan_soshum2' => ['required', 'string', 'max:255','different:jurusan_soshum1'],
            ]);
        }
        if ($validator->fails()) {
            return redirect('simulasi/create')
                ->withErrors($validator)
                ->withInput();
        }

        // return $jurusan_saintek1;
        if ($request->jurusan_saintek1) {
            $jurusan_saintek = "satu";
            $simulasi_a1 = new Simulasi;
            $simulasi_a1->pilihan = '1';
            $simulasi_a1->program_studi = $request['program_studi_kode'];
            $simulasi_a1->matematika = $request['matematika'];
            $simulasi_a1->fisika = $request['fisika'];
            $simulasi_a1->kimia = $request['kimia'];
            $simulasi_a1->biologi = $request['biologi'];
            $simulasi_a1->k_penalaran_umum = $request['k_penalaran_umum_saintek'];
            $simulasi_a1->m_bacaan_menulis = $request['m_bacaan_dan_menulis_saintek'];
            $simulasi_a1->peng_pengetahuan_umum = $request['peng_dan_pemahaman_umum_saintek'];
            $simulasi_a1->k_kuantitatif = $request['k_kuantitatif_saintek'];
            $simulasi_a1->jurusan_kode = $request['jurusan_saintek1'];
            $simulasi_a1->hasil = PerhitunganController::saintek($request, $jurusan_saintek);
            $simulasi_a1->user_id = $thisUser->id;
            $simulasi_a1->save();
        }
        // return $simulasi_a1;
        if ($request->jurusan_saintek2) {
            $jurusan_saintek = "dua";
            $simulasi_a2 = new Simulasi;
            $simulasi_a2->pilihan = '2';
            $simulasi_a2->program_studi = $request['program_studi_kode'];
            $simulasi_a2->matematika = $request['matematika'];
            $simulasi_a2->fisika = $request['fisika'];
            $simulasi_a2->kimia = $request['kimia'];
            $simulasi_a2->biologi = $request['biologi'];
            $simulasi_a2->k_penalaran_umum = $request['k_penalaran_umum_saintek'];
            $simulasi_a2->m_bacaan_menulis = $request['m_bacaan_dan_menulis_saintek'];
            $simulasi_a2->peng_pengetahuan_umum = $request['peng_dan_pemahaman_umum_saintek'];
            $simulasi_a2->k_kuantitatif = $request['k_kuantitatif_saintek'];
            $simulasi_a2->jurusan_kode = $request['jurusan_saintek2'];
            $simulasi_a2->hasil = PerhitunganController::saintek($request, $jurusan_saintek);
            $simulasi_a2->user_id = $thisUser->id;
            $simulasi_a2->save();
        }
        if ($request->jurusan_soshum1) {
            $jurusan_soshum = "satu";
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
            $simulasi->hasil = PerhitunganController::soshum($request, $jurusan_soshum);
            $simulasi->user_id = $thisUser->id;
            $simulasi->save();
        }
        if ($request->jurusan_soshum2) {
            $jurusan_soshum = "dua";
            $simulasi = new Simulasi;
            $simulasi->pilihan = '2';
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
            $simulasi->hasil = PerhitunganController::soshum($request, $jurusan_soshum);
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
    public function show($id_simulasi)
    {
        $rekomendasi = DB::table('saran_manuals')
        ->join('jurusans','saran_manuals.jurusan_kode','jurusans.kode')
        ->join('universitas','jurusans.universitas_kode','universitas.kode')
        ->select('jurusans.*','universitas.nama as universitas')
        ->where('saran_manuals.simulasi_manual_id','=',$id_simulasi)
        ->get();
        // return $rekomendasi;
        return view('simulasi.rekomendasi',array())->with('rekomendasi',$rekomendasi);
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
            $simulasi = Simulasi::find($simulasi_id);
            $rekomendasi = PerhitunganController::rekomendasi($simulasi);

            foreach ($rekomendasi as $key => $rekomendasi) {
                $saran_manual = new SaranManual;
                $saran_manual->prioritas = $rekomendasi->prioritas;
                $saran_manual->simulasi_manual_id = $simulasi_id;
                $saran_manual->jurusan_kode = $rekomendasi->kode;
                $saran_manual->save();
            }

            $simulasi_manual = Simulasi::find($simulasi_id);
            $simulasi_manual->hasil = 'tidaklolos_terekomendasi';
            $simulasi_manual->save();

            Alert::success('Success', 'Berhasil Menambah Data');
            return redirect('simulasi');
        }
    }
}
