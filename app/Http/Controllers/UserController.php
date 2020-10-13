<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Validator;
use Illuminate\Support\Facades\Hash;
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index',array())
        ->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_hp' => ['required', 'string', 'max:20'],
            'role' => ['string', 'max:255'],
            'alamat' => ['string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return redirect('user/create')
                ->withErrors($validator)
                ->withInput();
        }
        $user = new User;
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->no_hp = $request['no_hp'];
        $user->role = $request['role'];
        $user->alamat = $request['alamat'];
        $user->password = Hash::make($request['password']);
        $user->save();

        Alert::success('Success', 'Berhasil Menambah User');
        return redirect('user');
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
        $user = User::find($user->id);
        return view('user.edit',array())->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',  'unique:users,email,'.$user->id],
            'no_hp' => ['required', 'string', 'max:20'],
            'role' => ['string', 'max:255'],
            'alamat' => ['string', 'max:255'],
            'password' => ['confirmed'],
        ]);
        $user = User::find($user->id);
        if ($validator->fails()) {
            return redirect('user/'.$user->id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->no_hp = $request['no_hp'];
        $user->role = $request['role'];
        $user->alamat = $request['alamat'];
        if ($request['password'] != '') {
            $validator = Validator::make($request->all(), [
                'password' => ['string', 'min:8', 'confirmed'],
            ]);
            if ($validator->fails()) {
                return redirect('user/'.$user->id.'/edit')
                    ->withErrors($validator)
                    ->withInput();
            }
            $user->password = Hash::make($request['password']);
        }
        $user->save();
        Alert::success('Success', 'Berhasil Mengubah User');
        return redirect('user/'.$user->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::find($user->id)->delete();
        Alert::success('Success', 'Berhasil Menghapus User');
        return back();
    }
}
