<?php

namespace App\Http\Controllers;

use App\Model\BankDetail;
use Illuminate\Http\Request;

class BankInfoController extends Controller
{

    public function index()
    {
        $banks = BankDetail::with('country')->orderBy('id')->where("type", "admin")->paginate(10);
        return view('admin.bank.list', compact('banks'));
    }


    public function create()
    {
        return view('admin.bank.create');
    }

    public function validation($request, $bakDetail = [])
    {
        $emailValidation = empty($bakDetail) ? '' : ',' . $bakDetail->id;
        return $validateData = $request->validate([
            'country_id' => 'required',
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $this->validation($request);
        try {
            $validateData['is_active'] = isset($request->is_active) && $request->is_active == 'on' ? true : false;
            $bakDetail = BankDetail::create($validateData);

            return redirect()->route('bank.index')->withSuccess('Record created Successfully.!');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }


    public function show(BankDetail $bankDetail)
    {
        //
    }

    public function edit(BankDetail $bankDetail)
    {
        return view('admin.bank.edit', compact('store'));
    }


    public function update(Request $request, BankDetail $bankDetail)
    {
        $validateData = $this->validation($request, $bankDetail);
        try {
            $validateData['is_active'] = isset($request->is_active) && $request->is_active == 'on' ? true : false;
            $bankDetail->update($validateData);
            $bankDetail->save();
            return redirect()->route('bank.index')->withSuccess('Record updated Successfully.!');
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy(BankDetail $bankDetail)
    {
        try {
            $bankDetail->delete();
            return redirect()->route('bank.index')->withSuccess('Record deleted Successfully.!');
        }catch (\Exception $e){
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
