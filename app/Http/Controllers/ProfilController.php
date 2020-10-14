<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Auth;
use Validator;
use Illuminate\Support\Facades\Hash;
use Alert;

class ProfilController extends Controller
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
        return view('profil.index',array())->with('user',$user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profil)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',  'unique:users,email,'.$profil->id],
            'no_hp' => ['required', 'string', 'max:20'],
            'alamat' => ['string', 'max:255'],
        ]);
        $user = User::find($profil->id);
        if ($validator->fails()) {
            return redirect('profil/')
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->no_hp = $request['no_hp'];
        $user->alamat = $request['alamat'];
        if ($request['password'] != '') {
            $validator = Validator::make($request->all(), [
                'password' => ['string', 'min:8', 'confirmed'],
            ]);
            if ($validator->fails()) {
                return redirect('profil')
                    ->withErrors($validator)
                    ->withInput();
            }
            $user->password = Hash::make($request['password']);
        }
        $user->save();

        Alert::success('Success', 'Berhasil Mengubah Data');
        return redirect('profil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
