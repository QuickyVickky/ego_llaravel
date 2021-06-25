<?php

namespace App\Http\Controllers;

use App\Model\Country;
use Illuminate\Http\Request;

class CountryController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $countries = Country::orderBy('name')->get();

        return view('admin.default.country.list', compact('countries'));
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
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country) {
        return view('admin.default.country.edit', compact('country'));
    }

    public function update(Request $request, Country $country) {
        $validateData = $request->validate([
            'name'     => 'required|unique:countries,name,' . $country->id,
            'code'     => 'required|unique:countries,code,' . $country->id,
            'currency' => 'required',
        ]);
        $country->is_active = $request->is_active == 'on' ? true : false;
        $country->name      = $request->name;
        $country->code      = $request->code;
        $country->currency  = strtoupper($request->currency);
        $country->save();
        return redirect()->route('country.index')->withSuccess("Record inserted successfully.!");
    }

    public function destroy(Country $country) {
        //
    }
}
