<?php

namespace App\Http\Controllers;

use App\Models\Universitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use Alert;

class UniversitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universitas = Universitas::all();

        return view('universitas.index',array())
        ->with('universitas',$universitas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('universitas.create');
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
            'kode' => ['required', 'string', 'max:255', 'unique:universitas'],
            'akronim' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('universitas/create')
                ->withErrors($validator)
                ->withInput();
        }
        $universitas = new Universitas;
        $universitas->nama = $request['nama'];
        $universitas->kode = $request['kode'];
        $universitas->akronim = $request['akronim'];
        $universitas->save();

        Alert::success('Success', 'Berhasil Menambah Data');
        return redirect('universitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Universitas  $universita
     * @return \Illuminate\Http\Response
     */
    public function show(Universitas $universita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Universitas  $universita
     * @return \Illuminate\Http\Response
     */
    public function edit(Universitas $universita)
    {
        $universitas = Universitas::find($universita->id);
        return view('universitas.edit',array())->with('universitas',$universitas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Universitas  $universita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Universitas $universita)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'kode' => ['required', 'string', 'max:255', 'unique:universitas,kode,'.$universita->id],
            'akronim' => ['required', 'string', 'max:255'],
        ]);
        $universitas = Universitas::find($universita->id);
        if ($validator->fails()) {
            return redirect('universitas/'.$universita->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $universitas->nama = $request['nama'];
        $universitas->kode = $request['kode'];
        $universitas->akronim = $request['akronim'];
        $universitas->save();
        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect('universitas/'.$universita->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Universitas  $universita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Universitas $universita)
    {
        Universitas::find($universita->id)->delete();
        Alert::success('Success', 'Berhasil Menghapus Data');
        return back();
    }
}
