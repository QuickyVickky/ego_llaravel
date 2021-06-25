<?php

namespace App\Http\Controllers;

use App\Model\Zelle;
use Illuminate\Http\Request;

class ZelleController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $zelle = Zelle::first();

        return view('admin.zelle.list')->with([
            'zelle' => $zelle,
        ]);
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
    public function edit(Zelle $zelle) {
        $zelle = Zelle::where('id', $zelle->id)->first();

        return view('admin.zelle.edit')->with([
            'zelle' => $zelle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zelle $zelle) {
        $request->validate([
            'zelle_description' => 'required|unique:zelles,zelle_description,' . $zelle->id,
        ]);

        Zelle::where('id', $zelle->id)->update([
            'zelle_description' => $request->zelle_description,
        ]);

        return redirect()->route('zelle.index')->withSuccess('Record updated Successfully.!');
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
}
