<?php

namespace App\Http\Controllers;

use App\Model\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{

    public function index()
    {
        $configurations = Configuration::paginate(10);
        return view('admin.configuration.list',compact('configurations'));
    }


    public function create()
    {
        return view('admin.configuration.create');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $configuration = Configuration::find($id);
        return view('admin.configuration.edit',compact('configuration'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'key'=>'required|unique:configurations,key',
            'value'=>'required',
        ]);

        Configuration::create(['key'=>$request->key,'value'=>$request->value]);

        return redirect()->route('configure.index')->withSuccess("Record inserted successfully.!");

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'key'=>'required|unique:configurations,key',
            'value'=>'required',
        ]);

        Configuration::where("id",$id)->update(['key'=>$request->key,'value'=>$request->value]);

        return redirect()->route('configure.index')->withSuccess("Record updated successfully.!");

    }

    public function destroy($id)
    {
        Configuration::where("id",$id)->delete();

        return redirect()->route('configure.index')->withSuccess("Record deleted successfully.!");
    }

    public function settings()
    {
        $settings = Configuration::pluck('value','key')->all();
        return view('admin.configuration.settings',compact('settings'));

    }
    public function settingsUpdate(Request $request)
    {
//        $request->validate([
//            'key'=>'required|unique:configurations,key',
//            'value'=>'nullable',
//        ]);

        foreach ($request->settings as $key => $value) {
            if (!isset($value)){
                $value = '';
            }
            Configuration::updateOrCreate(['key' => $key], ['key' => $key, 'value' => $value]);
        }


        return redirect()->route('settings')->withSuccess("Setting update successfully.!");

    }

}
