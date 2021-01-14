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
        $nilai_tryout = DB::table('nilai_tryouts')
        ->select('nilai_tryouts.*')
        ->where('nilai_tryouts.peserta_id','=',$peserta->id)
        ->get();
        $jurusan_pilih = DB::table('jurusans')
        ->select('jurusans.*')
        ->where('jurusans.kode','=',$request->jurusan)
        ->get();
        

        foreach ($jurusan_pilih as $key => $jurusan_pilih) {
            // return $jurusan_pilih->program_studi_kode;
            if ($jurusan_pilih->program_studi_kode == 'saintek') {
                foreach ($nilai_tryout as $key => $nilai_tryout) {
                    if ($nilai_tryout->mapel_kode == 'k_penalaran_umum') {
                        $k_penalaran_umum_kes_a = 0.3*$nilai_tryout->skor;
                        $k_penalaran_umum_kes_b = 0.3*$nilai_tryout->skor;
                        $k_penalaran_umum_tek_a = 0.3*$nilai_tryout->skor;
                        $k_penalaran_umum_tek_b = 0.3*$nilai_tryout->skor;
                        $k_penalaran_umum_mipa_a = 0.25*$nilai_tryout->skor;
                        $k_penalaran_umum_mipa_b = 0.25*$nilai_tryout->skor;
                        $k_penalaran_umum_mipa_c = 0.25*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'k_kuantitatif') {
                        $k_kuantitatif_kes_a = 0.2*$nilai_tryout->skor;
                        $k_kuantitatif_kes_b = 0.2*$nilai_tryout->skor;
                        $k_kuantitatif_tek_a = 0.25*$nilai_tryout->skor;
                        $k_kuantitatif_tek_b = 0.25*$nilai_tryout->skor;
                        $k_kuantitatif_mipa_a = 0.3*$nilai_tryout->skor;
                        $k_kuantitatif_mipa_b = 0.3*$nilai_tryout->skor;
                        $k_kuantitatif_mipa_c = 0.2*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'peng_dan_pemahaman_umum') {
                        $peng_dan_pemahaman_umum_kes_a = 0.3*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_kes_b = 0.3*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_tek_a = 0.25*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_tek_b = 0.25*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_mipa_a = 0.25*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_mipa_b = 0.2*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_mipa_c = 0.3*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'm_bacaan_dan_menulis') {
                        $m_bacaan_dan_menulis_kes_a = 0.2*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_kes_b = 0.2*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_tek_a = 0.2*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_tek_b = 0.2*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_mipa_a = 0.2*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_mipa_b = 0.25*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_mipa_c = 0.25*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'matematika') {
                        $matematika_kes_a = 0.15*$nilai_tryout->skor;
                        $matematika_kes_b = 0.15*$nilai_tryout->skor;
                        $matematika_tek_a = 0.3*$nilai_tryout->skor;
                        $matematika_tek_b = 0.35*$nilai_tryout->skor;
                        $matematika_mipa_a = 0.35*$nilai_tryout->skor;
                        $matematika_mipa_b = 0.25*$nilai_tryout->skor;
                        $matematika_mipa_c = 0.15*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'fisika') {
                        $fisika_kes_a = 0.15*$nilai_tryout->skor;
                        $fisika_kes_b = 0.15*$nilai_tryout->skor;
                        $fisika_tek_a = 0.4*$nilai_tryout->skor;
                        $fisika_tek_b = 0.3*$nilai_tryout->skor;
                        $fisika_mipa_a = 0.35*$nilai_tryout->skor;
                        $fisika_mipa_b = 0.25*$nilai_tryout->skor;
                        $fisika_mipa_c = 0.15*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'kimia') {
                        $kimia_kes_a = 0.3*$nilai_tryout->skor;
                        $kimia_kes_b = 0.4*$nilai_tryout->skor;
                        $kimia_tek_a = 0.15*$nilai_tryout->skor;
                        $kimia_tek_b = 0.2*$nilai_tryout->skor;
                        $kimia_mipa_a = 0.15*$nilai_tryout->skor;
                        $kimia_mipa_b = 0.3*$nilai_tryout->skor;
                        $kimia_mipa_c = 0.35*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'biologi') {
                        $biologi_kes_a = 0.4*$nilai_tryout->skor;
                        $biologi_kes_b = 0.3*$nilai_tryout->skor;
                        $biologi_tek_a = 0.15*$nilai_tryout->skor;
                        $biologi_tek_b = 0.15*$nilai_tryout->skor;
                        $biologi_mipa_a = 0.15*$nilai_tryout->skor;
                        $biologi_mipa_b = 0.2*$nilai_tryout->skor;
                        $biologi_mipa_c = 0.35*$nilai_tryout->skor;
                    }
                }
                $kes_a = ($k_penalaran_umum_kes_a+$k_kuantitatif_kes_a+$peng_dan_pemahaman_umum_kes_a+$m_bacaan_dan_menulis_kes_a)*0.6+($matematika_kes_a+$fisika_kes_a+$kimia_kes_a+$biologi_kes_a)*0.4;
                $kes_b = ($k_penalaran_umum_kes_b+$k_kuantitatif_kes_b+$peng_dan_pemahaman_umum_kes_b+$m_bacaan_dan_menulis_kes_b)*0.6+($matematika_kes_b+$fisika_kes_b+$kimia_kes_b+$biologi_kes_b)*0.4;
                $tek_a = ($k_penalaran_umum_tek_a+$k_kuantitatif_tek_a+$peng_dan_pemahaman_umum_tek_a+$m_bacaan_dan_menulis_tek_a)*0.6+($matematika_tek_a+$fisika_tek_a+$kimia_tek_a+$biologi_tek_a)*0.4;
                $tek_b = ($k_penalaran_umum_tek_b+$k_kuantitatif_tek_b+$peng_dan_pemahaman_umum_tek_b+$m_bacaan_dan_menulis_tek_b)*0.6+($matematika_tek_b+$fisika_tek_b+$kimia_tek_b+$biologi_tek_b)*0.4;
                $mipa_a = ($k_penalaran_umum_mipa_a+$k_kuantitatif_mipa_a+$peng_dan_pemahaman_umum_mipa_a+$m_bacaan_dan_menulis_mipa_a)*0.6+($matematika_mipa_a+$fisika_mipa_a+$kimia_mipa_a+$biologi_mipa_a)*0.4;
                $mipa_b = ($k_penalaran_umum_mipa_b+$k_kuantitatif_mipa_b+$peng_dan_pemahaman_umum_mipa_b+$m_bacaan_dan_menulis_mipa_b)*0.6+($matematika_mipa_b+$fisika_mipa_b+$kimia_mipa_b+$biologi_mipa_b)*0.4;
                $mipa_c = ($k_penalaran_umum_mipa_c+$k_kuantitatif_mipa_c+$peng_dan_pemahaman_umum_mipa_c+$m_bacaan_dan_menulis_mipa_c)*0.6+($matematika_mipa_c+$fisika_mipa_c+$kimia_mipa_c+$biologi_mipa_c)*0.4;
    
                
                if ($jurusan_pilih->cluster_kode == 'KES-A') {
                    if ($jurusan_pilih->nilai_perhitungan <= $kes_a) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $kes_a) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'KES-B') {
                    if ($jurusan_pilih->nilai_perhitungan <= $kes_b) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $kes_b) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'MIPA-A') {
                    if ($jurusan_pilih->nilai_perhitungan <= $mipa_a) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $mipa_a) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'MIPA-B') {
                    if ($jurusan_pilih->nilai_perhitungan <= $mipa_b) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $mipa_b) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'TEK-A') {
                    if ($jurusan_pilih->nilai_perhitungan <= $tek_a) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $tek_a) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'TEK-B') {
                    if ($jurusan_pilih->nilai_perhitungan <= $tek_b) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $tek_b) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'TEK-C') {
                    if ($jurusan_pilih->nilai_perhitungan <= $tek_c) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $tek_c) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'kosong') {
                    $hasil = "cluster_kosong";
                }
            }

            if ($jurusan_pilih->program_studi_kode == 'soshum') {
                foreach ($nilai_tryout as $key => $nilai_tryout) {
                    if ($nilai_tryout->mapel_kode == 'k_penalaran_umum') {
                        $k_penalaran_umum_eko_a = 0.3*$nilai_tryout->skor;
                        $k_penalaran_umum_eko_b = 0.3*$nilai_tryout->skor;
                        $k_penalaran_umum_sos_a = 0.3*$nilai_tryout->skor;
                        $k_penalaran_umum_sos_b = 0.3*$nilai_tryout->skor;
                        $k_penalaran_umum_bud_a = 0.2*$nilai_tryout->skor;
                        $k_penalaran_umum_bud_b = 0.2*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'k_kuantitatif') {
                        $k_kuantitatif_eko_a = 0.3*$nilai_tryout->skor;
                        $k_kuantitatif_eko_b = 0.3*$nilai_tryout->skor;
                        $k_kuantitatif_sos_a = 0.2*$nilai_tryout->skor;
                        $k_kuantitatif_sos_b = 0.2*$nilai_tryout->skor;
                        $k_kuantitatif_bud_a = 0.2*$nilai_tryout->skor;
                        $k_kuantitatif_bud_b = 0.2*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'peng_dan_pemahaman_umum') {
                        $peng_dan_pemahaman_umum_eko_a = 0.2*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_eko_b = 0.2*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_sos_a = 0.3*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_sos_b = 0.3*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_bud_a = 0.3*$nilai_tryout->skor;
                        $peng_dan_pemahaman_umum_bud_b = 0.3*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'm_bacaan_dan_menulis') {
                        $m_bacaan_dan_menulis_eko_a = 0.2*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_eko_b = 0.2*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_sos_a = 0.2*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_sos_b = 0.2*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_bud_a = 0.3*$nilai_tryout->skor;
                        $m_bacaan_dan_menulis_bud_b = 0.3*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'matematika') {
                        $matematika_soshum_eko_a = 0.275*$nilai_tryout->skor;
                        $matematika_soshum_eko_b = 0.35*$nilai_tryout->skor;
                        $matematika_soshum_sos_a = 0.175*$nilai_tryout->skor;
                        $matematika_soshum_sos_b = 0.175*$nilai_tryout->skor;
                        $matematika_soshum_bud_a = 0.15*$nilai_tryout->skor;
                        $matematika_soshum_bud_b = 0.15*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'geografi') {
                        $geografi_eko_a = 0.125*$nilai_tryout->skor;
                        $geografi_eko_b = 0.125*$nilai_tryout->skor;
                        $geografi_sos_a = 0.125*$nilai_tryout->skor;
                        $geografi_sos_b = 0.125*$nilai_tryout->skor;
                        $geografi_bud_a = 0.175*$nilai_tryout->skor;
                        $geografi_bud_b = 0.175*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'sejarah') {
                        $sejarah_eko_a = 0.125*$nilai_tryout->skor;
                        $sejarah_eko_b = 0.125*$nilai_tryout->skor;
                        $sejarah_sos_a = 0.25*$nilai_tryout->skor;
                        $sejarah_sos_b = 0.35*$nilai_tryout->skor;
                        $sejarah_bud_a = 0.35*$nilai_tryout->skor;
                        $sejarah_bud_b = 0.2*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'sosiologi') {
                        $sosiologi_eko_a = 0.125*$nilai_tryout->skor;
                        $sosiologi_eko_b = 0.125*$nilai_tryout->skor;
                        $sosiologi_sos_a = 0.35*$nilai_tryout->skor;
                        $sosiologi_sos_b = 0.25*$nilai_tryout->skor;
                        $sosiologi_bud_a = 0.2*$nilai_tryout->skor;
                        $sosiologi_bud_b = 0.35*$nilai_tryout->skor;
                    }
                    if ($nilai_tryout->mapel_kode == 'ekonomi') {
                        $ekonomi_eko_a = 0.35*$nilai_tryout->skor;
                        $ekonomi_eko_b = 0.275*$nilai_tryout->skor;
                        $ekonomi_sos_a = 0.125*$nilai_tryout->skor;
                        $ekonomi_sos_b = 0.125*$nilai_tryout->skor;
                        $ekonomi_bud_a = 0.125*$nilai_tryout->skor;
                        $ekonomi_bud_b = 0.125*$nilai_tryout->skor;
                    }
                }
                $eko_a = ($k_penalaran_umum_eko_a+$k_kuantitatif_eko_a+$peng_dan_pemahaman_umum_eko_a+$m_bacaan_dan_menulis_eko_a)*0.6+($matematika_soshum_eko_a+$geografi_eko_a+$sejarah_eko_a+$sosiologi_eko_a+$ekonomi_eko_a)*0.4;
                $eko_b = ($k_penalaran_umum_eko_b+$k_kuantitatif_eko_b+$peng_dan_pemahaman_umum_eko_b+$m_bacaan_dan_menulis_eko_b)*0.6+($matematika_soshum_eko_b+$geografi_eko_b+$sejarah_eko_b+$sosiologi_eko_b+$ekonomi_eko_b)*0.4;
                $sos_a = ($k_penalaran_umum_sos_a+$k_kuantitatif_sos_a+$peng_dan_pemahaman_umum_sos_a+$m_bacaan_dan_menulis_sos_a)*0.6+($matematika_soshum_sos_a+$geografi_sos_a+$sejarah_sos_a+$sosiologi_sos_a+$ekonomi_sos_a)*0.4;
                $sos_b = ($k_penalaran_umum_sos_b+$k_kuantitatif_sos_b+$peng_dan_pemahaman_umum_sos_b+$m_bacaan_dan_menulis_sos_b)*0.6+($matematika_soshum_sos_b+$geografi_sos_b+$sejarah_sos_b+$sosiologi_sos_b+$ekonomi_sos_b)*0.4;
                $bud_a = ($k_penalaran_umum_bud_a+$k_kuantitatif_bud_a+$peng_dan_pemahaman_umum_bud_a+$m_bacaan_dan_menulis_bud_a)*0.6+($matematika_soshum_bud_a+$geografi_bud_a+$sejarah_bud_a+$sosiologi_bud_a+$ekonomi_bud_a)*0.4;
                $bud_b = ($k_penalaran_umum_bud_b+$k_kuantitatif_bud_b+$peng_dan_pemahaman_umum_bud_b+$m_bacaan_dan_menulis_bud_b)*0.6+($matematika_soshum_bud_b+$geografi_bud_b+$sejarah_bud_b+$sosiologi_bud_b+$ekonomi_bud_b)*0.4;

                
                if ($jurusan_pilih->cluster_kode == 'EKO-A') {
                    if ($jurusan_pilih->nilai_perhitungan <= $eko_a) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $eko_a) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'EKO-B') {
                    if ($jurusan_pilih->nilai_perhitungan <= $eko_b) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $eko_b) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'SOS-A') {
                    if ($jurusan_pilih->nilai_perhitungan <= $sos_a) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $sos_a) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'SOS-B') {
                    if ($jurusan_pilih->nilai_perhitungan <= $sos_b) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $sos_b) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'BUD-A') {
                    if ($jurusan_pilih->nilai_perhitungan <= $bud_a) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $bud_a) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'BUD-B') {
                    if ($jurusan_pilih->nilai_perhitungan <= $bud_b) {
                        $hasil = 'lolos';
                    }
                    else if ($jurusan_pilih->nilai_perhitungan > $bud_b) {
                        $hasil = 'tidaklolos';
                    }
                }
                if ($jurusan_pilih->cluster_kode == 'kosong') {
                    $hasil = "cluster_kosong";
                }
            }
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
        $data = Jurusan::select('nama', 'kode')->where('universitas_kode', $request->kode)->where('program_studi_kode', $request->jenis_program_studi)->where('cluster_kode','!=','kosong')->take(100)->get();
        return response()->json($data);
    }

    public function rekomendasi($simulasi_id)
    {
        return redirect()->back();
        // belum selesai
        $simulasi = DB::table('simulasi_tryouts')
        ->join('jurusans','simulasi_tryouts.jurusan_kode','jurusans.kode')
        ->join('pesertas','simulasi_tryouts.peserta_id','pesertas.id')
        ->join('nilai_tryouts','pesertas.id','nilai_tryouts.peserta_id')
        ->select('simulasi_tryouts.pilihan','jurusans.program_studi_kode as program_studi', 'nilai_tryouts.*')
        ->where('simulasi_tryouts.id','=',$simulasi_id)
        ->get();

        $rekomendasi = PerhitunganController::rekomendasiTryout($simulasi);
        return $rekomendasi;

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
