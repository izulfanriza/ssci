<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Universitas;
use App\Models\Cluster;
use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use Alert;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jurusans = Jurusan::all();

        return view('jurusan.index',array())
        ->with('jurusans',$jurusans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['universitas'] = Universitas::all();
        $data['clusters'] = Cluster::all();
        $data['program_studis'] = ProgramStudi::all();

        return view('jurusan.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lower_nama = strtolower($request['nama']);
        $temp_nama = str_replace(' ','-',$lower_nama);
        $lower_universitas = strtolower($request['universitas']);
        $temp_universitas = str_replace(' ','-',$lower_universitas);
        $kode = $temp_nama.'_'.$temp_universitas;

        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'nilai' => ['required', 'integer', 'max:1000'],
            'prioritas' => ['required', 'string', 'max:2'],
            'kuota' => ['required', 'integer', 'max:1000'],
            'tahun' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:255'],
            'universitas' => ['required', 'string', 'max:255'],
            'cluster' => ['required', 'string', 'max:255'],
            'program_studi' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('jurusan/create')
                ->withErrors($validator)
                ->withInput();
        }
        $jurusan = new Jurusan;
        $jurusan->kode = $kode;
        $jurusan->nama = $request['nama'];
        $jurusan->nilai_perhitungan = $request['nilai'];
        $jurusan->prioritas = $request['prioritas'];
        $jurusan->kuota = $request['kuota'];
        $jurusan->tahun = $request['tahun'];
        $jurusan->deskripsi = $request['deskripsi'];
        $jurusan->universitas_kode = $request['universitas'];
        $jurusan->cluster_kode = $request['cluster'];
        $jurusan->program_studi_kode = $request['program_studi'];
        $jurusan->save();

        Alert::success('Success', 'Berhasil Menambah Data');
        return redirect('jurusan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function edit(Jurusan $jurusan)
    {
        $universitas = Universitas::all();
        $clusters = Cluster::all();
        $program_studis = ProgramStudi::all();

        $jurusan = Jurusan::find($jurusan->id);
        return view('jurusan.edit')
        ->with('jurusan',$jurusan)
        ->with('universitas',$universitas)
        ->with('clusters',$clusters)
        ->with('program_studis',$program_studis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        $lower_nama = strtolower($request['nama']);
        $temp_nama = str_replace(' ','-',$lower_nama);
        $lower_universitas = strtolower($request['universitas']);
        $temp_universitas = str_replace(' ','-',$lower_universitas);
        $kode = $temp_nama.'_'.$temp_universitas;

        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'nilai' => ['required', 'integer', 'max:1000'],
            'prioritas' => ['required', 'string', 'max:2'],
            'kuota' => ['required', 'integer', 'max:1000'],
            'tahun' => ['required', 'string', 'max:255'],
            'deskripsi' => ['required', 'string', 'max:255'],
            'universitas' => ['required', 'string', 'max:255'],
            'cluster' => ['required', 'string', 'max:255'],
            'program_studi' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('jurusan/'.$jurusan->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $jurusan = Jurusan::find($jurusan->id);
        $jurusan->kode = $kode;
        $jurusan->nama = $request['nama'];
        $jurusan->nilai_perhitungan = $request['nilai'];
        $jurusan->prioritas = $request['prioritas'];
        $jurusan->kuota = $request['kuota'];
        $jurusan->tahun = $request['tahun'];
        $jurusan->deskripsi = $request['deskripsi'];
        $jurusan->universitas_kode = $request['universitas'];
        $jurusan->cluster_kode = $request['cluster'];
        $jurusan->program_studi_kode = $request['program_studi'];
        $jurusan->save();

        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect('jurusan/'.$jurusan->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jurusan  $jurusan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::find($jurusan->id)->delete();
        Alert::success('Success', 'Berhasil Menghapus Data');
        return back();
    }

    public static function saintek()
    {
        return "lolos";
    }
    public static function soshum()
    {
        return "tidaklolos";
    }
}
