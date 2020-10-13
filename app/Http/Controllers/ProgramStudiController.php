<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use Alert;

class ProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $program_studis = ProgramStudi::all();

        return view('programstudi.index',array())
        ->with('program_studis',$program_studis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('programstudi.create');
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
            'kode' => ['required', 'string', 'max:255', 'unique:program_studis'],
            'nama' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('programstudi/create')
                ->withErrors($validator)
                ->withInput();
        }
        $programstudi = new ProgramStudi;
        $programstudi->kode = $request['kode'];
        $programstudi->nama = $request['nama'];
        $programstudi->save();

        Alert::success('Success', 'Berhasil Menambah Data');
        return redirect('programstudi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProgramStudi  $programstudi
     * @return \Illuminate\Http\Response
     */
    public function show(ProgramStudi $programstudi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProgramStudi  $programstudi
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgramStudi $programstudi)
    {
        $programstudi = ProgramStudi::find($programstudi->id);
        return view('programstudi.edit',array())->with('programstudi',$programstudi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProgramStudi  $programstudi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgramStudi $programstudi)
    {
        $validator = Validator::make($request->all(), [
            'kode' => ['required', 'string', 'max:255', 'unique:program_studis,kode,'.$programstudi->id],
            'nama' => ['required', 'string', 'max:255'],
        ]);
        $programstudi = programstudi::find($programstudi->id);
        if ($validator->fails()) {
            return redirect('programstudi/'.$programstudi->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $programstudi->kode = $request['kode'];
        $programstudi->nama = $request['nama'];
        $programstudi->save();
        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect('programstudi/'.$programstudi->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProgramStudi  $programstudi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProgramStudi $programstudi)
    {
        ProgramStudi::find($programstudi->id)->delete();
        Alert::success('Success', 'Berhasil Menghapus Data');
        return back();
    }
}
