<?php

namespace App\Http\Controllers;

use App\Models\Tryout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use Alert;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TryoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tryouts = Tryout::all();

        return view('tryout.index',array())
        ->with('tryouts',$tryouts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tryout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'tanggal_tka' => ['required', 'string', 'max:255'],
            'pukul_tka' => ['required', 'string', 'max:255'],
            'tanggal_tps' => ['required', 'string', 'max:255'],
            'pukul_tps' => ['required', 'string', 'max:255'],
            'jenis' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('tryout/create')
                ->withErrors($validator)
                ->withInput();
        }
        $tanggal_tka = date('Y-m-d', strtotime($request->tanggal_tka));
        $tanggal_tps = date('Y-m-d', strtotime($request->tanggal_tps));
        $pukul_tka = date("H:i", strtotime($request->pukul_tka));
        $pukul_tps = date("H:i", strtotime($request->pukul_tps));

        $tryout = new Tryout;
        $tryout->kode = strtoupper(Str::random(5)).'-'.Carbon::createFromFormat('m/d/Y', $request['tanggal_tka'])->formatLocalized("%d%m%Y");
        $tryout->nama = $request['nama'];
        $tryout->tanggal_tka = $tanggal_tka;
        // $tryout->tanggal_indo_tka = Carbon::parse($request['tanggal_tka'])->formatLocalized("%A, %d %B %Y");
        $tryout->tanggal_indo_tka = Carbon::createFromFormat('m/d/Y', $request['tanggal_tka'])->isoFormat('dddd, D MMMM Y');
        $tryout->pukul_tka = $pukul_tka;
        $tryout->tanggal_tps = $tanggal_tps;
        $tryout->tanggal_indo_tps = Carbon::createFromFormat('m/d/Y', $request['tanggal_tps'])->isoFormat('dddd, D MMMM Y');
        $tryout->pukul_tps = $pukul_tps;
        $tryout->jenis = $request['jenis'];
        $tryout->save();

        Alert::success('Success', 'Berhasil Menambah Data');
        return redirect('tryout');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function show(Tryout $tryout)
    {
        $tryout = Tryout::find($tryout->id);
        $pesertas = DB::table('tryouts')
        ->join('pesertas','tryouts.kode','pesertas.tryout_kode')
        ->select('pesertas.*')
        ->where('tryouts.kode','=',$tryout->kode)
        ->get();

        return view('tryout.show',array())
        ->with('tryout',$tryout)
        ->with('pesertas',$pesertas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function edit(Tryout $tryout)
    {
        $tryout = Tryout::find($tryout->id);

        $tanggal_tka = date('m/d/Y', strtotime($tryout->tanggal_tka));
        $pukul_tka = date("g:i A", strtotime($tryout->pukul_tka));
        $tanggal_tps = date('m/d/Y', strtotime($tryout->tanggal_tps));
        $pukul_tps = date("g:i A", strtotime($tryout->pukul_tps));

        return view('tryout.edit')
        ->with('tanggal_tka',$tanggal_tka)
        ->with('pukul_tka',$pukul_tka)
        ->with('tanggal_tps',$tanggal_tps)
        ->with('pukul_tps',$pukul_tps)
        ->with('tryout',$tryout);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tryout $tryout)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'tanggal_tka' => ['required', 'string', 'max:255'],
            'pukul_tka' => ['required', 'string', 'max:255'],
            'tanggal_tps' => ['required', 'string', 'max:255'],
            'pukul_tps' => ['required', 'string', 'max:255'],
            'jenis' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('tryout/'.$tryout->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $tanggal_tka = date('Y-m-d', strtotime($request->tanggal_tka));
        $tanggal_tps = date('Y-m-d', strtotime($request->tanggal_tps));
        $pukul_tka = date("H:i", strtotime($request->pukul_tka));
        $pukul_tps = date("H:i", strtotime($request->pukul_tps));

        $tryout = Tryout::find($tryout->id);
        $tryout->kode = strtoupper(Str::random(5)).'-'.Carbon::createFromFormat('m/d/Y', $request['tanggal_tka'])->formatLocalized("%d%m%Y");
        $tryout->nama = $request['nama'];
        $tryout->tanggal_tka = $tanggal_tka;
        $tryout->tanggal_indo_tka = Carbon::createFromFormat('m/d/Y', $request['tanggal_tka'])->formatLocalized("%A, %d %B %Y");
        $tryout->pukul_tka = $pukul_tka;
        $tryout->tanggal_tps = $tanggal_tps;
        $tryout->tanggal_indo_tps = Carbon::createFromFormat('m/d/Y', $request['tanggal_tps'])->formatLocalized("%A, %d %B %Y");
        $tryout->pukul_tps = $pukul_tps;
        $tryout->jenis = $request['jenis'];
        $tryout->save();

        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect('tryout/'.$tryout->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tryout  $tryout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tryout $tryout)
    {
        Tryout::find($tryout->id)->delete();
        Alert::success('Success', 'Berhasil Menghapus Data');
        return back();
    }
}
