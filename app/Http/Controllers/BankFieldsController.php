<?php

namespace App\Http\Controllers;

use App\Model\BankFieldOption;
use App\Model\BankFields;
use Illuminate\Http\Request;

class BankFieldsController extends Controller {

    public function index() {
        $bankFields = BankFields::with('country')->orderByDesc('id')->get();

        return view('admin.bank_field.list', compact('bankFields'));
    }

    public function create() {
        $countries     = getCountry();
        $bankFieldType = config('constants.bankFieldType');

        return view('admin.bank_field.create')->with([
            'countries'     => $countries,
            'bankFieldType' => $bankFieldType,
        ]);
    }

    public function validation($request, $bakDetail = []) {
        $emailValidation = empty($bakDetail) ? '' : ',' . $bakDetail->id;

        return $validateData = $request->validate([
            'title'      => 'required',
            'country_id' => 'required',
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'title'          => 'required',
            'country_id'     => 'required|unique:bank_fields,country_id,NULL,id,deleted_at,NULL',
            'fields'         => 'array|min:1',
            'fields.*.name'  => 'required|max:255|without_spaces',
            'fields.*.value' => 'required|max:255',
        ]);

        try {
            $bankField = BankFields::create([
                'country_id' => $request->country_id,
                'title'      => $request->title,
            ]);

            foreach ($request->fields as $rf) {
                BankFieldOption::create([
                    'bank_field_id' => $bankField->id,
                    'field_type'    => $rf['type'],
                    'field_name'    => $rf['name'],
                    'field_value'   => $rf['value'],
                ]);
            }

            return redirect()->route('bank_field.index')->withSuccess('Record created Successfully.!');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function show(BankFields $bankFields) {
        //
    }

    public function edit(BankFields $bankField) {
        $bankFieldOption = BankFieldOption::where('bank_field_id', $bankField->id)->get();

        $countries     = getCountry();
        $bankFieldType = config('constants.bankFieldType');

        return view('admin.bank_field.edit')->with([
            'bankField'       => $bankField,
            'countries'       => $countries,
            'bankFieldType'   => $bankFieldType,
            'bankFieldOption' => $bankFieldOption,
        ]);
    }

    public function update(Request $request, BankFields $bankFields) {
        $request->validate([
            'title'          => 'required',
            'country_id'     => 'required|unique:bank_fields,country_id,' . $bankFields->id . ',id,deleted_at,NULL',
            'fields'         => 'array|min:1',
            'fields.*.name'  => 'required|max:255|without_spaces',
            'fields.*.value' => 'required|max:255',
        ]);

        try {
            BankFields::where('id', $bankFields->id)->update([
                'country_id' => $request->country_id,
                'title'      => $request->title,
            ]);

            foreach ($request->fields as $rf) {
                BankFieldOption::where('id', $rf['bfoid'])->update([
                    'field_type'  => $rf['type'],
                    'field_name'  => $rf['name'],
                    'field_value' => $rf['value'],
                ]);
            }

            return redirect()->route('bank_field.index')->withSuccess('Record updated Successfully.!');
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy(BankFields $bankFields) {
        BankFields::where('id', $bankFields->id)->delete();

        return redirect()->route('bank_field.index')->withSuccess('Record deleted Successfully.!');
    }

    public function deleteBankField($bankFieldId) {
        BankFields::where('id', $bankFieldId)->delete();

        return redirect()->route('bank_field.index')->withSuccess('Record deleted Successfully.!');
    }
}
