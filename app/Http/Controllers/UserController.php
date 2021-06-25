<?php

namespace App\Http\Controllers;

use App\Model\Recipient;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::with([
            'countryData',
            'transaction' => function ($query) {
                $query->where('status', 'complete')->orderByDesc('id');
            },
        ])->where("type", 'user')->get();

        return view('admin.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

    public function changePassword($id) {
        $user = User::where("id", $id)->first();
        return view('admin.user.change_password', compact('user'));
    }

    public function doChangePassword($id, Request $request) {
        $request->validate([
            'password'              => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        $user           = User::where("id", $id)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('user.change_password', $id)->withSuccess('Password updated successfully.!');
    }

    public function recipients($userId, Request $request) {
        $users = Recipient::where("user_id", $userId)->get();

        return view('admin.user.recipient', compact('users'));
    }

}
