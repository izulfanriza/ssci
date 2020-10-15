<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use Alert;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mapels = Mapel::all();

        return view('mapel.index',array())
        ->with('mapels',$mapels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mapel.create');
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
            'kode' => ['required', 'string', 'max:255', 'unique:mapels'],
            'nama' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('mapel/create')
                ->withErrors($validator)
                ->withInput();
        }
        $mapel = new Mapel;
        $mapel->kode = $request['kode'];
        $mapel->nama = $request['nama'];
        $mapel->save();

        Alert::success('Success', 'Berhasil Menambah Data');
        return redirect('mapel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mapel $mapel)
    {
        $mapel = Mapel::find($mapel->id);
        return view('mapel.edit',array())->with('mapel',$mapel);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mapel $mapel)
    {
        $validator = Validator::make($request->all(), [
            'kode' => ['required', 'string', 'max:255', 'unique:mapels,kode,'.$mapel->id],
            'nama' => ['required', 'string', 'max:255'],
        ]);
        $mapel = Mapel::find($mapel->id);
        if ($validator->fails()) {
            return redirect('mapel/'.$mapel->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $mapel->kode = $request['kode'];
        $mapel->nama = $request['nama'];
        $mapel->save();
        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect('mapel/'.$mapel->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mapel  $mapel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mapel $mapel)
    {
        Mapel::find($mapel->id)->delete();
        Alert::success('Success', 'Berhasil Menghapus Data');
        return back();
    }
}
