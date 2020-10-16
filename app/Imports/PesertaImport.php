<?php

namespace App\Imports;

use App\Models\Peserta;
use App\Models\Tryout;
use App\Models\NilaiTryout;
use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\DB;

class PesertaImport implements ToCollection
{
    
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $key => $value) {
            if ($key>0) {
                $peserta = new Peserta;
                $peserta->nama = $value[1];
                $peserta->nomor = $value[2];
                $peserta->rank_tka = $value[3];
                $peserta->skor_tka = $value[4];
                $peserta->rank_tps = $value[5];
                $peserta->skor_tps = $value[6];
                $peserta->tryout_kode = $value[0];
                $peserta->save();

                $peserta_id = $peserta->id;

                // penalaran_umum
                $nilai_tryout_k_penalaran_umum = new NilaiTryout;
                $nilai_tryout_k_penalaran_umum->benar = $value[7];
                $nilai_tryout_k_penalaran_umum->salah = $value[8];
                $nilai_tryout_k_penalaran_umum->kosong = $value[9];
                $nilai_tryout_k_penalaran_umum->skor = $value[10];
                $nilai_tryout_k_penalaran_umum->mapel_kode = 'k_penalaran_umum';
                $nilai_tryout_k_penalaran_umum->peserta_id = $peserta_id;
                $nilai_tryout_k_penalaran_umum->save();

                // bacaan_menulis
                $nilai_tryout_m_bacaan_dan_menulis = new NilaiTryout;
                $nilai_tryout_m_bacaan_dan_menulis->benar = $value[11];
                $nilai_tryout_m_bacaan_dan_menulis->salah = $value[12];
                $nilai_tryout_m_bacaan_dan_menulis->kosong = $value[13];
                $nilai_tryout_m_bacaan_dan_menulis->skor = $value[14];
                $nilai_tryout_m_bacaan_dan_menulis->mapel_kode = 'm_bacaan_dan_menulis';
                $nilai_tryout_m_bacaan_dan_menulis->peserta_id = $peserta_id;
                $nilai_tryout_m_bacaan_dan_menulis->save();

                // pemahaman_umum
                $nilai_tryout_peng_dan_pemahaman_umum = new NilaiTryout;
                $nilai_tryout_peng_dan_pemahaman_umum->benar = $value[15];
                $nilai_tryout_peng_dan_pemahaman_umum->salah = $value[16];
                $nilai_tryout_peng_dan_pemahaman_umum->kosong = $value[17];
                $nilai_tryout_peng_dan_pemahaman_umum->skor = $value[18];
                $nilai_tryout_peng_dan_pemahaman_umum->mapel_kode = 'peng_dan_pemahaman_umum';
                $nilai_tryout_peng_dan_pemahaman_umum->peserta_id = $peserta_id;
                $nilai_tryout_peng_dan_pemahaman_umum->save();

                // tps_kuantitatif
                $nilai_tryout_k_kuantitatif = new NilaiTryout;
                $nilai_tryout_k_kuantitatif->benar = $value[19];
                $nilai_tryout_k_kuantitatif->salah = $value[20];
                $nilai_tryout_k_kuantitatif->kosong = $value[21];
                $nilai_tryout_k_kuantitatif->skor = $value[22];
                $nilai_tryout_k_kuantitatif->mapel_kode = 'k_kuantitatif';
                $nilai_tryout_k_kuantitatif->peserta_id = $peserta_id;
                $nilai_tryout_k_kuantitatif->save();

                // matematika
                $nilai_tryout_matematika = new NilaiTryout;
                $nilai_tryout_matematika->benar = $value[23];
                $nilai_tryout_matematika->salah = $value[24];
                $nilai_tryout_matematika->kosong = $value[25];
                $nilai_tryout_matematika->skor = $value[26];
                $nilai_tryout_matematika->mapel_kode = 'matematika';
                $nilai_tryout_matematika->peserta_id = $peserta_id;
                $nilai_tryout_matematika->save();


                // biologi
                $nilai_tryout_biologi = new NilaiTryout;
                $nilai_tryout_biologi->benar = $value[27];
                $nilai_tryout_biologi->salah = $value[28];
                $nilai_tryout_biologi->kosong = $value[29];
                $nilai_tryout_biologi->skor = $value[30];
                $nilai_tryout_biologi->mapel_kode = 'biologi';
                $nilai_tryout_biologi->peserta_id = $peserta_id;
                $nilai_tryout_biologi->save();

                // fisika
                $nilai_tryout_fisika = new NilaiTryout;
                $nilai_tryout_fisika->benar = $value[31];
                $nilai_tryout_fisika->salah = $value[32];
                $nilai_tryout_fisika->kosong = $value[33];
                $nilai_tryout_fisika->skor = $value[34];
                $nilai_tryout_fisika->mapel_kode = 'fisika';
                $nilai_tryout_fisika->peserta_id = $peserta_id;
                $nilai_tryout_fisika->save();

                // kimia
                $nilai_tryout_kimia = new NilaiTryout;
                $nilai_tryout_kimia->benar = $value[35];
                $nilai_tryout_kimia->salah = $value[36];
                $nilai_tryout_kimia->kosong = $value[37];
                $nilai_tryout_kimia->skor = $value[38];
                $nilai_tryout_kimia->mapel_kode = 'kimia';
                $nilai_tryout_kimia->peserta_id = $peserta_id;
                $nilai_tryout_kimia->save();

                // ekonomi
                $nilai_tryout_ekonomi = new NilaiTryout;
                $nilai_tryout_ekonomi->benar = $value[39];
                $nilai_tryout_ekonomi->salah = $value[40];
                $nilai_tryout_ekonomi->kosong = $value[41];
                $nilai_tryout_ekonomi->skor = $value[42];
                $nilai_tryout_ekonomi->mapel_kode = 'ekonomi';
                $nilai_tryout_ekonomi->peserta_id = $peserta_id;
                $nilai_tryout_ekonomi->save();

                // geografi
                $nilai_tryout_geografi = new NilaiTryout;
                $nilai_tryout_geografi->benar = $value[43];
                $nilai_tryout_geografi->salah = $value[44];
                $nilai_tryout_geografi->kosong = $value[45];
                $nilai_tryout_geografi->skor = $value[46];
                $nilai_tryout_geografi->mapel_kode = 'geografi';
                $nilai_tryout_geografi->peserta_id = $peserta_id;
                $nilai_tryout_geografi->save();

                // sosiologi
                $nilai_tryout_sosiologi = new NilaiTryout;
                $nilai_tryout_sosiologi->benar = $value[47];
                $nilai_tryout_sosiologi->salah = $value[48];
                $nilai_tryout_sosiologi->kosong = $value[49];
                $nilai_tryout_sosiologi->skor = $value[50];
                $nilai_tryout_sosiologi->mapel_kode = 'sosiologi';
                $nilai_tryout_sosiologi->peserta_id = $peserta_id;
                $nilai_tryout_sosiologi->save();
                
                // sejarah
                $nilai_tryout_sejarah = new NilaiTryout;
                $nilai_tryout_sejarah->benar = $value[51];
                $nilai_tryout_sejarah->salah = $value[52];
                $nilai_tryout_sejarah->kosong = $value[53];
                $nilai_tryout_sejarah->skor = $value[54];
                $nilai_tryout_sejarah->mapel_kode = 'sejarah';
                $nilai_tryout_sejarah->peserta_id = $peserta_id;
                $nilai_tryout_sejarah->save();

           }
        }
    }
}
