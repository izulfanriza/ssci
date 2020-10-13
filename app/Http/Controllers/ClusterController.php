<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use Alert;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clusters = Cluster::all();

        return view('cluster.index',array())
        ->with('clusters',$clusters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cluster.create');
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
            'kode' => ['required', 'string', 'max:255', 'unique:clusters'],
            'nama' => ['required', 'string', 'max:255'],
            'klasifikasi' => ['required', 'string', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect('cluster/create')
                ->withErrors($validator)
                ->withInput();
        }
        $cluster = new Cluster;
        $cluster->kode = $request['kode'];
        $cluster->nama = $request['nama'];
        $cluster->klasifikasi = $request['klasifikasi'];
        $cluster->save();

        Alert::success('Success', 'Berhasil Menambah Data');
        return redirect('cluster');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function show(Cluster $cluster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function edit(Cluster $cluster)
    {
        $cluster = Cluster::find($cluster->id);
        return view('cluster.edit',array())->with('cluster',$cluster);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cluster $cluster)
    {
        $validator = Validator::make($request->all(), [
            'kode' => ['required', 'string', 'max:255', 'unique:clusters,kode,'.$cluster->id],
            'nama' => ['required', 'string', 'max:255'],
            'klasifikasi' => ['required', 'string', 'max:255'],
        ]);
        $cluster = Cluster::find($cluster->id);
        if ($validator->fails()) {
            return redirect('cluster/'.$cluster->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $cluster->kode = $request['kode'];
        $cluster->nama = $request['nama'];
        $cluster->klasifikasi = $request['klasifikasi'];
        $cluster->save();
        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect('cluster/'.$cluster->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cluster $cluster)
    {
        Cluster::find($cluster->id)->delete();
        Alert::success('Success', 'Berhasil Menghapus Data');
        return back();
    }
}
