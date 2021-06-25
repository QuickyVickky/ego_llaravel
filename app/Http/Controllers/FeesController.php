<?php

namespace App\Http\Controllers;

use App\Model\Fees;
use App\Model\Store;
use Illuminate\Http\Request;

class FeesController extends Controller {

    public function index() {
        $transfer = Config('constants.FeesType');

        $fees = Fees::orderBy('id')->get();

        return view('admin.fees.list')->with([
            'fees'     => $fees,
            'transfer' => $transfer,
        ]);
    }

    public function create() {
        $transfer = Config('constants.FeesType');

        return view('admin.fees.create')->with([
            'transfer' => $transfer,
        ]);
    }

    public function validation($request) {
        return $validateData = $request->validate([
            'type'       => 'required|unique:fees',
            'percentage' => 'required',
        ]);
    }

    public function validationUpdate($request, $fee = null) {
        return $validateData = $request->validate([
            'type'       => 'required|unique:fees,type,' . $fee->id,
            'percentage' => 'required',
        ]);
    }

    public function store(Request $request) {
        $validateData = $this->validation($request);
        try {
            $fees = Fees::create($validateData);
            return redirect()->route('fees.index')->withSuccess('Record created Successfully.!');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function show(Fees $fees) {
        //
    }

    public function edit(Fees $fee) {
        $transfer = Config('constants.FeesType');

        return view('admin.fees.edit')->with([
            'fee'      => $fee,
            'transfer' => $transfer,
        ]);
    }

    public function update(Request $request, Fees $fee) {
        $validateData = $this->validationUpdate($request, $fee);
        try {
            $fee->update($validateData);
            $fee->save();
            return redirect()->route('fees.index')->withSuccess('Record updated Successfully.!');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy(Fees $fee) {
        try {
            $fee->delete();
            return redirect()->route('fees.index')->withSuccess('Record deleted Successfully.!');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
