<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{

    public static function saintek($request, $jurusan_saintek)
    {

        $k_penalaran_umum_kes_a = 0.3*$request->k_penalaran_umum_saintek;
        $k_penalaran_umum_kes_b = 0.3*$request->k_penalaran_umum_saintek;
        $k_penalaran_umum_tek_a = 0.3*$request->k_penalaran_umum_saintek;
        $k_penalaran_umum_tek_b = 0.3*$request->k_penalaran_umum_saintek;
        $k_penalaran_umum_mipa_a = 0.25*$request->k_penalaran_umum_saintek;
        $k_penalaran_umum_mipa_b = 0.25*$request->k_penalaran_umum_saintek;
        $k_penalaran_umum_mipa_c = 0.25*$request->k_penalaran_umum_saintek;

        $k_kuantitatif_kes_a = 0.2*$request->k_kuantitatif_saintek;
        $k_kuantitatif_kes_b = 0.2*$request->k_kuantitatif_saintek;
        $k_kuantitatif_tek_a = 0.25*$request->k_kuantitatif_saintek;
        $k_kuantitatif_tek_b = 0.25*$request->k_kuantitatif_saintek;
        $k_kuantitatif_mipa_a = 0.3*$request->k_kuantitatif_saintek;
        $k_kuantitatif_mipa_b = 0.3*$request->k_kuantitatif_saintek;
        $k_kuantitatif_mipa_c = 0.2*$request->k_kuantitatif_saintek;

        $peng_dan_pemahaman_umum_kes_a = 0.3*$request->peng_dan_pemahaman_umum_saintek;
        $peng_dan_pemahaman_umum_kes_b = 0.3*$request->peng_dan_pemahaman_umum_saintek;
        $peng_dan_pemahaman_umum_tek_a = 0.25*$request->peng_dan_pemahaman_umum_saintek;
        $peng_dan_pemahaman_umum_tek_b = 0.25*$request->peng_dan_pemahaman_umum_saintek;
        $peng_dan_pemahaman_umum_mipa_a = 0.25*$request->peng_dan_pemahaman_umum_saintek;
        $peng_dan_pemahaman_umum_mipa_b = 0.2*$request->peng_dan_pemahaman_umum_saintek;
        $peng_dan_pemahaman_umum_mipa_c = 0.3*$request->peng_dan_pemahaman_umum_saintek;

        $m_bacaan_dan_menulis_kes_a = 0.2*$request->m_bacaan_dan_menulis_saintek;
        $m_bacaan_dan_menulis_kes_b = 0.2*$request->m_bacaan_dan_menulis_saintek;
        $m_bacaan_dan_menulis_tek_a = 0.2*$request->m_bacaan_dan_menulis_saintek;
        $m_bacaan_dan_menulis_tek_b = 0.2*$request->m_bacaan_dan_menulis_saintek;
        $m_bacaan_dan_menulis_mipa_a = 0.2*$request->m_bacaan_dan_menulis_saintek;
        $m_bacaan_dan_menulis_mipa_b = 0.25*$request->m_bacaan_dan_menulis_saintek;
        $m_bacaan_dan_menulis_mipa_c = 0.25*$request->m_bacaan_dan_menulis_saintek;

        $matematika_kes_a = 0.15*$request->matematika;
        $matematika_kes_b = 0.15*$request->matematika;
        $matematika_tek_a = 0.3*$request->matematika;
        $matematika_tek_b = 0.35*$request->matematika;
        $matematika_mipa_a = 0.35*$request->matematika;
        $matematika_mipa_b = 0.25*$request->matematika;
        $matematika_mipa_c = 0.15*$request->matematika;

        $fisika_kes_a = 0.15*$request->fisika;
        $fisika_kes_b = 0.15*$request->fisika;
        $fisika_tek_a = 0.4*$request->fisika;
        $fisika_tek_b = 0.3*$request->fisika;
        $fisika_mipa_a = 0.35*$request->fisika;
        $fisika_mipa_b = 0.25*$request->fisika;
        $fisika_mipa_c = 0.15*$request->fisika;
        
        $kimia_kes_a = 0.3*$request->kimia;
        $kimia_kes_b = 0.4*$request->kimia;
        $kimia_tek_a = 0.15*$request->kimia;
        $kimia_tek_b = 0.2*$request->kimia;
        $kimia_mipa_a = 0.15*$request->kimia;
        $kimia_mipa_b = 0.3*$request->kimia;
        $kimia_mipa_c = 0.35*$request->kimia;

        $biologi_kes_a = 0.4*$request->biologi;
        $biologi_kes_b = 0.3*$request->biologi;
        $biologi_tek_a = 0.15*$request->biologi;
        $biologi_tek_b = 0.15*$request->biologi;
        $biologi_mipa_a = 0.15*$request->biologi;
        $biologi_mipa_b = 0.2*$request->biologi;
        $biologi_mipa_c = 0.35*$request->biologi;

        $kes_a = ($k_penalaran_umum_kes_a+$k_kuantitatif_kes_a+$peng_dan_pemahaman_umum_kes_a+$m_bacaan_dan_menulis_kes_a)*0.6+($matematika_kes_a+$fisika_kes_a+$kimia_kes_a+$biologi_kes_a)*0.4;
        $kes_b = ($k_penalaran_umum_kes_b+$k_kuantitatif_kes_b+$peng_dan_pemahaman_umum_kes_b+$m_bacaan_dan_menulis_kes_b)*0.6+($matematika_kes_b+$fisika_kes_b+$kimia_kes_b+$biologi_kes_b)*0.4;
        $tek_a = ($k_penalaran_umum_tek_a+$k_kuantitatif_tek_a+$peng_dan_pemahaman_umum_tek_a+$m_bacaan_dan_menulis_tek_a)*0.6+($matematika_tek_a+$fisika_tek_a+$kimia_tek_a+$biologi_tek_a)*0.4;
        $tek_b = ($k_penalaran_umum_tek_b+$k_kuantitatif_tek_b+$peng_dan_pemahaman_umum_tek_b+$m_bacaan_dan_menulis_tek_b)*0.6+($matematika_tek_b+$fisika_tek_b+$kimia_tek_b+$biologi_tek_b)*0.4;
        $mipa_a = ($k_penalaran_umum_mipa_a+$k_kuantitatif_mipa_a+$peng_dan_pemahaman_umum_mipa_a+$m_bacaan_dan_menulis_mipa_a)*0.6+($matematika_mipa_a+$fisika_mipa_a+$kimia_mipa_a+$biologi_mipa_a)*0.4;
        $mipa_b = ($k_penalaran_umum_mipa_b+$k_kuantitatif_mipa_b+$peng_dan_pemahaman_umum_mipa_b+$m_bacaan_dan_menulis_mipa_b)*0.6+($matematika_mipa_b+$fisika_mipa_b+$kimia_mipa_b+$biologi_mipa_b)*0.4;
        $mipa_c = ($k_penalaran_umum_mipa_c+$k_kuantitatif_mipa_c+$peng_dan_pemahaman_umum_mipa_c+$m_bacaan_dan_menulis_mipa_c)*0.6+($matematika_mipa_c+$fisika_mipa_c+$kimia_mipa_c+$biologi_mipa_c)*0.4;

        if ($jurusan_saintek == 'satu') {
            // return "lolos";
            $jurusan_pilih = DB::table('jurusans')
            ->select('jurusans.*')
            ->where('jurusans.kode','=',$request->jurusan_saintek1)
            ->get();

            foreach ($jurusan_pilih as $key => $jurusan_pilih) {
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
                return $hasil;
            }
        }
        
        if ($jurusan_saintek == 'dua') {
            // return "hai";
            $jurusan_pilih = DB::table('jurusans')
            ->select('jurusans.*')
            ->where('jurusans.kode','=',$request->jurusan_saintek2)
            ->get();

            foreach ($jurusan_pilih as $key => $jurusan_pilih) {
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
                return $hasil;
            }
        }
        
        // return $hasil;
    }

    public static function soshum($request, $jurusan_soshum)
    {
        $k_penalaran_umum_eko_a = 0.3*$request->k_penalaran_umum_soshum;
        $k_penalaran_umum_eko_b = 0.3*$request->k_penalaran_umum_soshum;
        $k_penalaran_umum_sos_a = 0.3*$request->k_penalaran_umum_soshum;
        $k_penalaran_umum_sos_b = 0.3*$request->k_penalaran_umum_soshum;
        $k_penalaran_umum_bud_a = 0.2*$request->k_penalaran_umum_soshum;
        $k_penalaran_umum_bud_b = 0.2*$request->k_penalaran_umum_soshum;

        $k_kuantitatif_eko_a = 0.3*$request->k_kuantitatif_soshum;
        $k_kuantitatif_eko_b = 0.3*$request->k_kuantitatif_soshum;
        $k_kuantitatif_sos_a = 0.2*$request->k_kuantitatif_soshum;
        $k_kuantitatif_sos_b = 0.2*$request->k_kuantitatif_soshum;
        $k_kuantitatif_bud_a = 0.2*$request->k_kuantitatif_soshum;
        $k_kuantitatif_bud_b = 0.2*$request->k_kuantitatif_soshum;

        $peng_dan_pemahaman_umum_eko_a = 0.2*$request->peng_dan_pemahaman_umum_soshum;
        $peng_dan_pemahaman_umum_eko_b = 0.2*$request->peng_dan_pemahaman_umum_soshum;
        $peng_dan_pemahaman_umum_sos_a = 0.3*$request->peng_dan_pemahaman_umum_soshum;
        $peng_dan_pemahaman_umum_sos_b = 0.3*$request->peng_dan_pemahaman_umum_soshum;
        $peng_dan_pemahaman_umum_bud_a = 0.3*$request->peng_dan_pemahaman_umum_soshum;
        $peng_dan_pemahaman_umum_bud_b = 0.3*$request->peng_dan_pemahaman_umum_soshum;

        $m_bacaan_dan_menulis_eko_a = 0.2*$request->m_bacaan_dan_menulis_soshum;
        $m_bacaan_dan_menulis_eko_b = 0.2*$request->m_bacaan_dan_menulis_soshum;
        $m_bacaan_dan_menulis_sos_a = 0.2*$request->m_bacaan_dan_menulis_soshum;
        $m_bacaan_dan_menulis_sos_b = 0.2*$request->m_bacaan_dan_menulis_soshum;
        $m_bacaan_dan_menulis_bud_a = 0.3*$request->m_bacaan_dan_menulis_soshum;
        $m_bacaan_dan_menulis_bud_b = 0.3*$request->m_bacaan_dan_menulis_soshum;

        $matematika_soshum_eko_a = 0.275*$request->matematika_soshum;
        $matematika_soshum_eko_b = 0.35*$request->matematika_soshum;
        $matematika_soshum_sos_a = 0.175*$request->matematika_soshum;
        $matematika_soshum_sos_b = 0.175*$request->matematika_soshum;
        $matematika_soshum_bud_a = 0.15*$request->matematika_soshum;
        $matematika_soshum_bud_b = 0.15*$request->matematika_soshum;

        $geografi_eko_a = 0.125*$request->geografi;
        $geografi_eko_b = 0.125*$request->geografi;
        $geografi_sos_a = 0.125*$request->geografi;
        $geografi_sos_b = 0.125*$request->geografi;
        $geografi_bud_a = 0.175*$request->geografi;
        $geografi_bud_b = 0.175*$request->geografi;
        
        $sejarah_eko_a = 0.125*$request->sejarah;
        $sejarah_eko_b = 0.125*$request->sejarah;
        $sejarah_sos_a = 0.25*$request->sejarah;
        $sejarah_sos_b = 0.35*$request->sejarah;
        $sejarah_bud_a = 0.35*$request->sejarah;
        $sejarah_bud_b = 0.2*$request->sejarah;

        $sosiologi_eko_a = 0.125*$request->sosiologi;
        $sosiologi_eko_b = 0.125*$request->sosiologi;
        $sosiologi_sos_a = 0.35*$request->sosiologi;
        $sosiologi_sos_b = 0.25*$request->sosiologi;
        $sosiologi_bud_a = 0.2*$request->sosiologi;
        $sosiologi_bud_b = 0.35*$request->sosiologi;

        $ekonomi_eko_a = 0.35*$request->ekonomi;
        $ekonomi_eko_b = 0.275*$request->ekonomi;
        $ekonomi_sos_a = 0.125*$request->ekonomi;
        $ekonomi_sos_b = 0.125*$request->ekonomi;
        $ekonomi_bud_a = 0.125*$request->ekonomi;
        $ekonomi_bud_b = 0.125*$request->ekonomi;

        $eko_a = ($k_penalaran_umum_eko_a+$k_kuantitatif_eko_a+$peng_dan_pemahaman_umum_eko_a+$m_bacaan_dan_menulis_eko_a)*0.6+($matematika_soshum_eko_a+$geografi_eko_a+$sejarah_eko_a+$sosiologi_eko_a+$ekonomi_eko_a)*0.4;
        $eko_b = ($k_penalaran_umum_eko_b+$k_kuantitatif_eko_b+$peng_dan_pemahaman_umum_eko_b+$m_bacaan_dan_menulis_eko_b)*0.6+($matematika_soshum_eko_b+$geografi_eko_b+$sejarah_eko_b+$sosiologi_eko_b+$ekonomi_eko_b)*0.4;
        $sos_a = ($k_penalaran_umum_sos_a+$k_kuantitatif_sos_a+$peng_dan_pemahaman_umum_sos_a+$m_bacaan_dan_menulis_sos_a)*0.6+($matematika_soshum_sos_a+$geografi_sos_a+$sejarah_sos_a+$sosiologi_sos_a+$ekonomi_sos_a)*0.4;
        $sos_b = ($k_penalaran_umum_sos_b+$k_kuantitatif_sos_b+$peng_dan_pemahaman_umum_sos_b+$m_bacaan_dan_menulis_sos_b)*0.6+($matematika_soshum_sos_b+$geografi_sos_b+$sejarah_sos_b+$sosiologi_sos_b+$ekonomi_sos_b)*0.4;
        $bud_a = ($k_penalaran_umum_bud_a+$k_kuantitatif_bud_a+$peng_dan_pemahaman_umum_bud_a+$m_bacaan_dan_menulis_bud_a)*0.6+($matematika_soshum_bud_a+$geografi_bud_a+$sejarah_bud_a+$sosiologi_bud_a+$ekonomi_bud_a)*0.4;
        $bud_b = ($k_penalaran_umum_bud_b+$k_kuantitatif_bud_b+$peng_dan_pemahaman_umum_bud_b+$m_bacaan_dan_menulis_bud_b)*0.6+($matematika_soshum_bud_b+$geografi_bud_b+$sejarah_bud_b+$sosiologi_bud_b+$ekonomi_bud_b)*0.4;

        if ($jurusan_soshum == 'satu') {
            $jurusan_pilih = DB::table('jurusans')
            ->select('jurusans.*')
            ->where('jurusans.kode','=',$request->jurusan_soshum1)
            ->get();

            foreach ($jurusan_pilih as $key => $jurusan_pilih) {
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
                return $hasil;
            }
        }
        
        if ($jurusan_soshum == 'dua') {
            $jurusan_pilih = DB::table('jurusans')
            ->select('jurusans.*')
            ->where('jurusans.kode','=',$request->jurusan_soshum2)
            ->get();

            foreach ($jurusan_pilih as $key => $jurusan_pilih) {
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
                return $hasil;
            }
        }
    }

    public static function rekomendasi($simulasi)
    {
        if ($simulasi->program_studi == "saintek") {
            $k_penalaran_umum_kes_a = 0.3*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_kes_b = 0.3*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_tek_a = 0.3*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_tek_b = 0.3*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_mipa_a = 0.25*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_mipa_b = 0.25*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_mipa_c = 0.25*$simulasi->k_penalaran_umum;

            $k_kuantitatif_kes_a = 0.2*$simulasi->k_kuantitatif;
            $k_kuantitatif_kes_b = 0.2*$simulasi->k_kuantitatif;
            $k_kuantitatif_tek_a = 0.25*$simulasi->k_kuantitatif;
            $k_kuantitatif_tek_b = 0.25*$simulasi->k_kuantitatif;
            $k_kuantitatif_mipa_a = 0.3*$simulasi->k_kuantitatif;
            $k_kuantitatif_mipa_b = 0.3*$simulasi->k_kuantitatif;
            $k_kuantitatif_mipa_c = 0.2*$simulasi->k_kuantitatif;

            $peng_dan_pemahaman_umum_kes_a = 0.3*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_kes_b = 0.3*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_tek_a = 0.25*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_tek_b = 0.25*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_mipa_a = 0.25*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_mipa_b = 0.2*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_mipa_c = 0.3*$simulasi->peng_pengetahuan_umum;

            $m_bacaan_dan_menulis_kes_a = 0.2*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_kes_b = 0.2*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_tek_a = 0.2*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_tek_b = 0.2*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_mipa_a = 0.2*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_mipa_b = 0.25*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_mipa_c = 0.25*$simulasi->m_bacaan_menulis;

            $matematika_kes_a = 0.15*$simulasi->matematika;
            $matematika_kes_b = 0.15*$simulasi->matematika;
            $matematika_tek_a = 0.3*$simulasi->matematika;
            $matematika_tek_b = 0.35*$simulasi->matematika;
            $matematika_mipa_a = 0.35*$simulasi->matematika;
            $matematika_mipa_b = 0.25*$simulasi->matematika;
            $matematika_mipa_c = 0.15*$simulasi->matematika;

            $fisika_kes_a = 0.15*$simulasi->fisika;
            $fisika_kes_b = 0.15*$simulasi->fisika;
            $fisika_tek_a = 0.4*$simulasi->fisika;
            $fisika_tek_b = 0.3*$simulasi->fisika;
            $fisika_mipa_a = 0.35*$simulasi->fisika;
            $fisika_mipa_b = 0.25*$simulasi->fisika;
            $fisika_mipa_c = 0.15*$simulasi->fisika;
            
            $kimia_kes_a = 0.3*$simulasi->kimia;
            $kimia_kes_b = 0.4*$simulasi->kimia;
            $kimia_tek_a = 0.15*$simulasi->kimia;
            $kimia_tek_b = 0.2*$simulasi->kimia;
            $kimia_mipa_a = 0.15*$simulasi->kimia;
            $kimia_mipa_b = 0.3*$simulasi->kimia;
            $kimia_mipa_c = 0.35*$simulasi->kimia;

            $biologi_kes_a = 0.4*$simulasi->biologi;
            $biologi_kes_b = 0.3*$simulasi->biologi;
            $biologi_tek_a = 0.15*$simulasi->biologi;
            $biologi_tek_b = 0.15*$simulasi->biologi;
            $biologi_mipa_a = 0.15*$simulasi->biologi;
            $biologi_mipa_b = 0.2*$simulasi->biologi;
            $biologi_mipa_c = 0.35*$simulasi->biologi;

            $kes_a = ($k_penalaran_umum_kes_a+$k_kuantitatif_kes_a+$peng_dan_pemahaman_umum_kes_a+$m_bacaan_dan_menulis_kes_a)*0.6+($matematika_kes_a+$fisika_kes_a+$kimia_kes_a+$biologi_kes_a)*0.4;
            $kes_b = ($k_penalaran_umum_kes_b+$k_kuantitatif_kes_b+$peng_dan_pemahaman_umum_kes_b+$m_bacaan_dan_menulis_kes_b)*0.6+($matematika_kes_b+$fisika_kes_b+$kimia_kes_b+$biologi_kes_b)*0.4;
            $tek_a = ($k_penalaran_umum_tek_a+$k_kuantitatif_tek_a+$peng_dan_pemahaman_umum_tek_a+$m_bacaan_dan_menulis_tek_a)*0.6+($matematika_tek_a+$fisika_tek_a+$kimia_tek_a+$biologi_tek_a)*0.4;
            $tek_b = ($k_penalaran_umum_tek_b+$k_kuantitatif_tek_b+$peng_dan_pemahaman_umum_tek_b+$m_bacaan_dan_menulis_tek_b)*0.6+($matematika_tek_b+$fisika_tek_b+$kimia_tek_b+$biologi_tek_b)*0.4;
            $mipa_a = ($k_penalaran_umum_mipa_a+$k_kuantitatif_mipa_a+$peng_dan_pemahaman_umum_mipa_a+$m_bacaan_dan_menulis_mipa_a)*0.6+($matematika_mipa_a+$fisika_mipa_a+$kimia_mipa_a+$biologi_mipa_a)*0.4;
            $mipa_b = ($k_penalaran_umum_mipa_b+$k_kuantitatif_mipa_b+$peng_dan_pemahaman_umum_mipa_b+$m_bacaan_dan_menulis_mipa_b)*0.6+($matematika_mipa_b+$fisika_mipa_b+$kimia_mipa_b+$biologi_mipa_b)*0.4;
            $mipa_c = ($k_penalaran_umum_mipa_c+$k_kuantitatif_mipa_c+$peng_dan_pemahaman_umum_mipa_c+$m_bacaan_dan_menulis_mipa_c)*0.6+($matematika_mipa_c+$fisika_mipa_c+$kimia_mipa_c+$biologi_mipa_c)*0.4;

            $max = max($kes_a,$kes_b,$tek_a,$tek_b,$mipa_a,$mipa_b,$mipa_c);

            if ($max == $kes_a) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','KES-A')
                ->where('jurusans.nilai_perhitungan','<=',$kes_a)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $kes_b) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','KES-B')
                ->where('jurusans.nilai_perhitungan','<=',$kes_b)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $tek_a) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','TEK-A')
                ->where('jurusans.nilai_perhitungan','<=',$tek_a)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $tek_b) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','TEK-B')
                ->where('jurusans.nilai_perhitungan','<=',$tek_b)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $mipa_a) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','MIPA-A')
                ->where('jurusans.nilai_perhitungan','<=',$mipa_a)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $mipa_b) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','MIPA-B')
                ->where('jurusans.nilai_perhitungan','<=',$mipa_b)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $mipa_c) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','MIPA-C')
                ->where('jurusans.nilai_perhitungan','<=',$mipa_c)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
        }

        if ($simulasi->program_studi == "soshum") {
            $k_penalaran_umum_eko_a = 0.3*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_eko_b = 0.3*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_sos_a = 0.3*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_sos_b = 0.3*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_bud_a = 0.2*$simulasi->k_penalaran_umum;
            $k_penalaran_umum_bud_b = 0.2*$simulasi->k_penalaran_umum;

            $k_kuantitatif_eko_a = 0.3*$simulasi->k_kuantitatif;
            $k_kuantitatif_eko_b = 0.3*$simulasi->k_kuantitatif;
            $k_kuantitatif_sos_a = 0.2*$simulasi->k_kuantitatif;
            $k_kuantitatif_sos_b = 0.2*$simulasi->k_kuantitatif;
            $k_kuantitatif_bud_a = 0.2*$simulasi->k_kuantitatif;
            $k_kuantitatif_bud_b = 0.2*$simulasi->k_kuantitatif;

            $peng_dan_pemahaman_umum_eko_a = 0.2*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_eko_b = 0.2*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_sos_a = 0.3*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_sos_b = 0.3*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_bud_a = 0.3*$simulasi->peng_pengetahuan_umum;
            $peng_dan_pemahaman_umum_bud_b = 0.3*$simulasi->peng_pengetahuan_umum;

            $m_bacaan_dan_menulis_eko_a = 0.2*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_eko_b = 0.2*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_sos_a = 0.2*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_sos_b = 0.2*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_bud_a = 0.3*$simulasi->m_bacaan_menulis;
            $m_bacaan_dan_menulis_bud_b = 0.3*$simulasi->m_bacaan_menulis;

            $matematika_soshum_eko_a = 0.275*$simulasi->matematika;
            $matematika_soshum_eko_b = 0.35*$simulasi->matematika;
            $matematika_soshum_sos_a = 0.175*$simulasi->matematika;
            $matematika_soshum_sos_b = 0.175*$simulasi->matematika;
            $matematika_soshum_bud_a = 0.15*$simulasi->matematika;
            $matematika_soshum_bud_b = 0.15*$simulasi->matematika;

            $geografi_eko_a = 0.125*$simulasi->geografi;
            $geografi_eko_b = 0.125*$simulasi->geografi;
            $geografi_sos_a = 0.125*$simulasi->geografi;
            $geografi_sos_b = 0.125*$simulasi->geografi;
            $geografi_bud_a = 0.175*$simulasi->geografi;
            $geografi_bud_b = 0.175*$simulasi->geografi;
            
            $sejarah_eko_a = 0.125*$simulasi->sejarah;
            $sejarah_eko_b = 0.125*$simulasi->sejarah;
            $sejarah_sos_a = 0.25*$simulasi->sejarah;
            $sejarah_sos_b = 0.35*$simulasi->sejarah;
            $sejarah_bud_a = 0.35*$simulasi->sejarah;
            $sejarah_bud_b = 0.2*$simulasi->sejarah;

            $sosiologi_eko_a = 0.125*$simulasi->sosiologi;
            $sosiologi_eko_b = 0.125*$simulasi->sosiologi;
            $sosiologi_sos_a = 0.35*$simulasi->sosiologi;
            $sosiologi_sos_b = 0.25*$simulasi->sosiologi;
            $sosiologi_bud_a = 0.2*$simulasi->sosiologi;
            $sosiologi_bud_b = 0.35*$simulasi->sosiologi;

            $ekonomi_eko_a = 0.35*$simulasi->ekonomi;
            $ekonomi_eko_b = 0.275*$simulasi->ekonomi;
            $ekonomi_sos_a = 0.125*$simulasi->ekonomi;
            $ekonomi_sos_b = 0.125*$simulasi->ekonomi;
            $ekonomi_bud_a = 0.125*$simulasi->ekonomi;
            $ekonomi_bud_b = 0.125*$simulasi->ekonomi;

            $eko_a = ($k_penalaran_umum_eko_a+$k_kuantitatif_eko_a+$peng_dan_pemahaman_umum_eko_a+$m_bacaan_dan_menulis_eko_a)*0.6+($matematika_soshum_eko_a+$geografi_eko_a+$sejarah_eko_a+$sosiologi_eko_a+$ekonomi_eko_a)*0.4;
            $eko_b = ($k_penalaran_umum_eko_b+$k_kuantitatif_eko_b+$peng_dan_pemahaman_umum_eko_b+$m_bacaan_dan_menulis_eko_b)*0.6+($matematika_soshum_eko_b+$geografi_eko_b+$sejarah_eko_b+$sosiologi_eko_b+$ekonomi_eko_b)*0.4;
            $sos_a = ($k_penalaran_umum_sos_a+$k_kuantitatif_sos_a+$peng_dan_pemahaman_umum_sos_a+$m_bacaan_dan_menulis_sos_a)*0.6+($matematika_soshum_sos_a+$geografi_sos_a+$sejarah_sos_a+$sosiologi_sos_a+$ekonomi_sos_a)*0.4;
            $sos_b = ($k_penalaran_umum_sos_b+$k_kuantitatif_sos_b+$peng_dan_pemahaman_umum_sos_b+$m_bacaan_dan_menulis_sos_b)*0.6+($matematika_soshum_sos_b+$geografi_sos_b+$sejarah_sos_b+$sosiologi_sos_b+$ekonomi_sos_b)*0.4;
            $bud_a = ($k_penalaran_umum_bud_a+$k_kuantitatif_bud_a+$peng_dan_pemahaman_umum_bud_a+$m_bacaan_dan_menulis_bud_a)*0.6+($matematika_soshum_bud_a+$geografi_bud_a+$sejarah_bud_a+$sosiologi_bud_a+$ekonomi_bud_a)*0.4;
            $bud_b = ($k_penalaran_umum_bud_b+$k_kuantitatif_bud_b+$peng_dan_pemahaman_umum_bud_b+$m_bacaan_dan_menulis_bud_b)*0.6+($matematika_soshum_bud_b+$geografi_bud_b+$sejarah_bud_b+$sosiologi_bud_b+$ekonomi_bud_b)*0.4;

            $max = max($eko_a,$eko_b,$sos_a,$sos_b,$bud_a,$bud_b);

            if ($max == $eko_a) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','EKO-A')
                ->where('jurusans.nilai_perhitungan','<=',$eko_a)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $eko_b) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','EKO-B')
                ->where('jurusans.nilai_perhitungan','<=',$eko_b)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $sos_a) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','SOS-A')
                ->where('jurusans.nilai_perhitungan','<=',$sos_a)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $sos_b) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','SOS-B')
                ->where('jurusans.nilai_perhitungan','<=',$sos_b)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $bud_a) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','BUD-A')
                ->where('jurusans.nilai_perhitungan','<=',$bud_a)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
            if ($max == $bud_b) {
                $jurusan = DB::table('jurusans')
                ->join('universitas','jurusans.universitas_kode','universitas.kode')
                ->select('jurusans.*', 'universitas.nama as nama_universitas')
                ->where('jurusans.cluster_kode','=','BUD-B')
                ->where('jurusans.nilai_perhitungan','<=',$bud_b)
                ->where('jurusans.prioritas','=',$simulasi->pilihan)
                ->orderBy('jurusans.nilai_perhitungan','asc')
                ->orderBy('jurusans.kuota','desc')
                ->get();

                return $jurusan;
            }
        }
    }
    public static function rekomendasiTryout($simulasi)
    {
        foreach ($simulasi as $key => $simulasi) {
            
            if ($simulasi->program_studi == "saintek") {
                if ($simulasi->mapel_kode == "k_penalaran_umum") {
                    $k_penalaran_umum_kes_a = 0.3*$simulasi->skor;
                    $k_penalaran_umum_kes_b = 0.3*$simulasi->skor;
                    $k_penalaran_umum_tek_a = 0.3*$simulasi->skor;
                    $k_penalaran_umum_tek_b = 0.3*$simulasi->skor;
                    $k_penalaran_umum_mipa_a = 0.25*$simulasi->skor;
                    $k_penalaran_umum_mipa_b = 0.25*$simulasi->skor;
                    $k_penalaran_umum_mipa_c = 0.25*$simulasi->skor;
                }

                return $k_penalaran_umum_kes_a;
                
                if ($simulasi->mapel_kode == "k_kuantitatif") {
                    $k_kuantitatif_kes_a = 0.2*$simulasi->skor;
                    $k_kuantitatif_kes_b = 0.2*$simulasi->skor;
                    $k_kuantitatif_tek_a = 0.25*$simulasi->skor;
                    $k_kuantitatif_tek_b = 0.25*$simulasi->skor;
                    $k_kuantitatif_mipa_a = 0.3*$simulasi->skor;
                    $k_kuantitatif_mipa_b = 0.3*$simulasi->skor;
                    $k_kuantitatif_mipa_c = 0.2*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "peng_dan_pemahaman_umum") {
                    $peng_dan_pemahaman_umum_kes_a = 0.3*$simulasi->skor;
                    $peng_dan_pemahaman_umum_kes_b = 0.3*$simulasi->skor;
                    $peng_dan_pemahaman_umum_tek_a = 0.25*$simulasi->skor;
                    $peng_dan_pemahaman_umum_tek_b = 0.25*$simulasi->skor;
                    $peng_dan_pemahaman_umum_mipa_a = 0.25*$simulasi->skor;
                    $peng_dan_pemahaman_umum_mipa_b = 0.2*$simulasi->skor;
                    $peng_dan_pemahaman_umum_mipa_c = 0.3*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "m_bacaan_dan_menulis") {
                    $m_bacaan_dan_menulis_kes_a = 0.2*$simulasi->skor;
                    $m_bacaan_dan_menulis_kes_b = 0.2*$simulasi->skor;
                    $m_bacaan_dan_menulis_tek_a = 0.2*$simulasi->skor;
                    $m_bacaan_dan_menulis_tek_b = 0.2*$simulasi->skor;
                    $m_bacaan_dan_menulis_mipa_a = 0.2*$simulasi->skor;
                    $m_bacaan_dan_menulis_mipa_b = 0.25*$simulasi->skor;
                    $m_bacaan_dan_menulis_mipa_c = 0.25*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "matematika") {
                    $matematika_kes_a = 0.15*$simulasi->skor;
                    $matematika_kes_b = 0.15*$simulasi->skor;
                    $matematika_tek_a = 0.3*$simulasi->skor;
                    $matematika_tek_b = 0.35*$simulasi->skor;
                    $matematika_mipa_a = 0.35*$simulasi->skor;
                    $matematika_mipa_b = 0.25*$simulasi->skor;
                    $matematika_mipa_c = 0.15*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "fisika") {
                    $fisika_kes_a = 0.15*$simulasi->skor;
                    $fisika_kes_b = 0.15*$simulasi->skor;
                    $fisika_tek_a = 0.4*$simulasi->skor;
                    $fisika_tek_b = 0.3*$simulasi->skor;
                    $fisika_mipa_a = 0.35*$simulasi->skor;
                    $fisika_mipa_b = 0.25*$simulasi->skor;
                    $fisika_mipa_c = 0.15*$simulasi->skor;
                }
                
                if ($simulasi->mapel_kode == "kimia") {
                    $kimia_kes_a = 0.3*$simulasi->skor;
                    $kimia_kes_b = 0.4*$simulasi->skor;
                    $kimia_tek_a = 0.15*$simulasi->skor;
                    $kimia_tek_b = 0.2*$simulasi->skor;
                    $kimia_mipa_a = 0.15*$simulasi->skor;
                    $kimia_mipa_b = 0.3*$simulasi->skor;
                    $kimia_mipa_c = 0.35*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "biologi") {
                    $biologi_kes_a = 0.4*$simulasi->skor;
                    $biologi_kes_b = 0.3*$simulasi->skor;
                    $biologi_tek_a = 0.15*$simulasi->skor;
                    $biologi_tek_b = 0.15*$simulasi->skor;
                    $biologi_mipa_a = 0.15*$simulasi->skor;
                    $biologi_mipa_b = 0.2*$simulasi->skor;
                    $biologi_mipa_c = 0.35*$simulasi->skor;
                }

                $kes_a = ($k_penalaran_umum_kes_a+$k_kuantitatif_kes_a+$peng_dan_pemahaman_umum_kes_a+$m_bacaan_dan_menulis_kes_a)*0.6+($matematika_kes_a+$fisika_kes_a+$kimia_kes_a+$biologi_kes_a)*0.4;
                $kes_b = ($k_penalaran_umum_kes_b+$k_kuantitatif_kes_b+$peng_dan_pemahaman_umum_kes_b+$m_bacaan_dan_menulis_kes_b)*0.6+($matematika_kes_b+$fisika_kes_b+$kimia_kes_b+$biologi_kes_b)*0.4;
                $tek_a = ($k_penalaran_umum_tek_a+$k_kuantitatif_tek_a+$peng_dan_pemahaman_umum_tek_a+$m_bacaan_dan_menulis_tek_a)*0.6+($matematika_tek_a+$fisika_tek_a+$kimia_tek_a+$biologi_tek_a)*0.4;
                $tek_b = ($k_penalaran_umum_tek_b+$k_kuantitatif_tek_b+$peng_dan_pemahaman_umum_tek_b+$m_bacaan_dan_menulis_tek_b)*0.6+($matematika_tek_b+$fisika_tek_b+$kimia_tek_b+$biologi_tek_b)*0.4;
                $mipa_a = ($k_penalaran_umum_mipa_a+$k_kuantitatif_mipa_a+$peng_dan_pemahaman_umum_mipa_a+$m_bacaan_dan_menulis_mipa_a)*0.6+($matematika_mipa_a+$fisika_mipa_a+$kimia_mipa_a+$biologi_mipa_a)*0.4;
                $mipa_b = ($k_penalaran_umum_mipa_b+$k_kuantitatif_mipa_b+$peng_dan_pemahaman_umum_mipa_b+$m_bacaan_dan_menulis_mipa_b)*0.6+($matematika_mipa_b+$fisika_mipa_b+$kimia_mipa_b+$biologi_mipa_b)*0.4;
                $mipa_c = ($k_penalaran_umum_mipa_c+$k_kuantitatif_mipa_c+$peng_dan_pemahaman_umum_mipa_c+$m_bacaan_dan_menulis_mipa_c)*0.6+($matematika_mipa_c+$fisika_mipa_c+$kimia_mipa_c+$biologi_mipa_c)*0.4;

                $max = max($kes_a,$kes_b,$tek_a,$tek_b,$mipa_a,$mipa_b,$mipa_c);

                if ($max == $kes_a) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','KES-A')
                    ->where('jurusans.nilai_perhitungan','<=',$kes_a)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $kes_b) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','KES-B')
                    ->where('jurusans.nilai_perhitungan','<=',$kes_b)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $tek_a) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','TEK-A')
                    ->where('jurusans.nilai_perhitungan','<=',$tek_a)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $tek_b) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','TEK-B')
                    ->where('jurusans.nilai_perhitungan','<=',$tek_b)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $mipa_a) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','MIPA-A')
                    ->where('jurusans.nilai_perhitungan','<=',$mipa_a)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $mipa_b) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','MIPA-B')
                    ->where('jurusans.nilai_perhitungan','<=',$mipa_b)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $mipa_c) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','MIPA-C')
                    ->where('jurusans.nilai_perhitungan','<=',$mipa_c)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
            }

            if ($simulasi->program_studi == "soshum") {
                if ($simulasi->mapel_kode == "k_penalaran_umum") {
                    $k_penalaran_umum_eko_a = 0.3*$simulasi->skor;
                    $k_penalaran_umum_eko_b = 0.3*$simulasi->skor;
                    $k_penalaran_umum_sos_a = 0.3*$simulasi->skor;
                    $k_penalaran_umum_sos_b = 0.3*$simulasi->skor;
                    $k_penalaran_umum_bud_a = 0.2*$simulasi->skor;
                    $k_penalaran_umum_bud_b = 0.2*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "k_kuantitatif") {
                    $k_kuantitatif_eko_a = 0.3*$simulasi->skor;
                    $k_kuantitatif_eko_b = 0.3*$simulasi->skor;
                    $k_kuantitatif_sos_a = 0.2*$simulasi->skor;
                    $k_kuantitatif_sos_b = 0.2*$simulasi->skor;
                    $k_kuantitatif_bud_a = 0.2*$simulasi->skor;
                    $k_kuantitatif_bud_b = 0.2*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "peng_dan_pemahaman_umum") {
                    $peng_dan_pemahaman_umum_eko_a = 0.2*$simulasi->skor;
                    $peng_dan_pemahaman_umum_eko_b = 0.2*$simulasi->skor;
                    $peng_dan_pemahaman_umum_sos_a = 0.3*$simulasi->skor;
                    $peng_dan_pemahaman_umum_sos_b = 0.3*$simulasi->skor;
                    $peng_dan_pemahaman_umum_bud_a = 0.3*$simulasi->skor;
                    $peng_dan_pemahaman_umum_bud_b = 0.3*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "m_bacaan_dan_menulis") {
                    $m_bacaan_dan_menulis_eko_a = 0.2*$simulasi->skor;
                    $m_bacaan_dan_menulis_eko_b = 0.2*$simulasi->skor;
                    $m_bacaan_dan_menulis_sos_a = 0.2*$simulasi->skor;
                    $m_bacaan_dan_menulis_sos_b = 0.2*$simulasi->skor;
                    $m_bacaan_dan_menulis_bud_a = 0.3*$simulasi->skor;
                    $m_bacaan_dan_menulis_bud_b = 0.3*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "matematika") {
                    $matematika_soshum_eko_a = 0.275*$simulasi->skor;
                    $matematika_soshum_eko_b = 0.35*$simulasi->skor;
                    $matematika_soshum_sos_a = 0.175*$simulasi->skor;
                    $matematika_soshum_sos_b = 0.175*$simulasi->skor;
                    $matematika_soshum_bud_a = 0.15*$simulasi->skor;
                    $matematika_soshum_bud_b = 0.15*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "geografi") {
                    $geografi_eko_a = 0.125*$simulasi->skor;
                    $geografi_eko_b = 0.125*$simulasi->skor;
                    $geografi_sos_a = 0.125*$simulasi->skor;
                    $geografi_sos_b = 0.125*$simulasi->skor;
                    $geografi_bud_a = 0.175*$simulasi->skor;
                    $geografi_bud_b = 0.175*$simulasi->skor;
                }
                
                if ($simulasi->mapel_kode == "sejarah") {
                    $sejarah_eko_a = 0.125*$simulasi->skor;
                    $sejarah_eko_b = 0.125*$simulasi->skor;
                    $sejarah_sos_a = 0.25*$simulasi->skor;
                    $sejarah_sos_b = 0.35*$simulasi->skor;
                    $sejarah_bud_a = 0.35*$simulasi->skor;
                    $sejarah_bud_b = 0.2*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "sosiologi") {
                    $sosiologi_eko_a = 0.125*$simulasi->skor;
                    $sosiologi_eko_b = 0.125*$simulasi->skor;
                    $sosiologi_sos_a = 0.35*$simulasi->skor;
                    $sosiologi_sos_b = 0.25*$simulasi->skor;
                    $sosiologi_bud_a = 0.2*$simulasi->skor;
                    $sosiologi_bud_b = 0.35*$simulasi->skor;
                }

                if ($simulasi->mapel_kode == "ekonomi") {
                    $ekonomi_eko_a = 0.35*$simulasi->skor;
                    $ekonomi_eko_b = 0.275*$simulasi->skor;
                    $ekonomi_sos_a = 0.125*$simulasi->skor;
                    $ekonomi_sos_b = 0.125*$simulasi->skor;
                    $ekonomi_bud_a = 0.125*$simulasi->skor;
                    $ekonomi_bud_b = 0.125*$simulasi->skor;
                }

                $eko_a = ($k_penalaran_umum_eko_a+$k_kuantitatif_eko_a+$peng_dan_pemahaman_umum_eko_a+$m_bacaan_dan_menulis_eko_a)*0.6+($matematika_soshum_eko_a+$geografi_eko_a+$sejarah_eko_a+$sosiologi_eko_a+$ekonomi_eko_a)*0.4;
                $eko_b = ($k_penalaran_umum_eko_b+$k_kuantitatif_eko_b+$peng_dan_pemahaman_umum_eko_b+$m_bacaan_dan_menulis_eko_b)*0.6+($matematika_soshum_eko_b+$geografi_eko_b+$sejarah_eko_b+$sosiologi_eko_b+$ekonomi_eko_b)*0.4;
                $sos_a = ($k_penalaran_umum_sos_a+$k_kuantitatif_sos_a+$peng_dan_pemahaman_umum_sos_a+$m_bacaan_dan_menulis_sos_a)*0.6+($matematika_soshum_sos_a+$geografi_sos_a+$sejarah_sos_a+$sosiologi_sos_a+$ekonomi_sos_a)*0.4;
                $sos_b = ($k_penalaran_umum_sos_b+$k_kuantitatif_sos_b+$peng_dan_pemahaman_umum_sos_b+$m_bacaan_dan_menulis_sos_b)*0.6+($matematika_soshum_sos_b+$geografi_sos_b+$sejarah_sos_b+$sosiologi_sos_b+$ekonomi_sos_b)*0.4;
                $bud_a = ($k_penalaran_umum_bud_a+$k_kuantitatif_bud_a+$peng_dan_pemahaman_umum_bud_a+$m_bacaan_dan_menulis_bud_a)*0.6+($matematika_soshum_bud_a+$geografi_bud_a+$sejarah_bud_a+$sosiologi_bud_a+$ekonomi_bud_a)*0.4;
                $bud_b = ($k_penalaran_umum_bud_b+$k_kuantitatif_bud_b+$peng_dan_pemahaman_umum_bud_b+$m_bacaan_dan_menulis_bud_b)*0.6+($matematika_soshum_bud_b+$geografi_bud_b+$sejarah_bud_b+$sosiologi_bud_b+$ekonomi_bud_b)*0.4;

                $max = max($eko_a,$eko_b,$sos_a,$sos_b,$bud_a,$bud_b);

                if ($max == $eko_a) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','EKO-A')
                    ->where('jurusans.nilai_perhitungan','<=',$eko_a)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $eko_b) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','EKO-B')
                    ->where('jurusans.nilai_perhitungan','<=',$eko_b)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $sos_a) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','SOS-A')
                    ->where('jurusans.nilai_perhitungan','<=',$sos_a)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $sos_b) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','SOS-B')
                    ->where('jurusans.nilai_perhitungan','<=',$sos_b)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $bud_a) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','BUD-A')
                    ->where('jurusans.nilai_perhitungan','<=',$bud_a)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
                if ($max == $bud_b) {
                    $jurusan = DB::table('jurusans')
                    ->join('universitas','jurusans.universitas_kode','universitas.kode')
                    ->select('jurusans.*', 'universitas.nama as nama_universitas')
                    ->where('jurusans.cluster_kode','=','BUD-B')
                    ->where('jurusans.nilai_perhitungan','<=',$bud_b)
                    ->where('jurusans.prioritas','=',$simulasi->pilihan)
                    ->orderBy('jurusans.nilai_perhitungan','asc')
                    ->orderBy('jurusans.kuota','desc')
                    ->get();

                    return $jurusan;
                }
            }
        }
    }
    public static function findUniversitas1(Request $request)
    {
        $data = Jurusan::select('nama', 'kode')->where('universitas_kode', $request->kode)->where('program_studi_kode', $request->jenis_program_studi)->where('cluster_kode','!=','kosong')->take(100)->get();
        return response()->json($data);
    }
}
