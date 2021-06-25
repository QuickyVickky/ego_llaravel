<?php

namespace App\Http\Controllers;

use App\Model\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{

    public function index()
    {
        $stores = Store::orderBy('id')->paginate(10);
        return view('admin.store.list',compact('stores'));
    }


    public function create()
    {
        return view('admin.store.create');
    }

    public function validation($request,$store = []){
        $emailValidation = empty($store) ? '' : ','.$store->id;

        return $validateData = $request->validate([
            'name'=>'required',
            'email' => 'required|email|unique:stores,email'.$emailValidation,
            'mobile'=>'required',
            'address1'=>'required',
            'address2'=>'required',
            'city'=>'required',
            'state'=>'required',
            'country'=>'required',
            'zipcode'=>'required',
            'image'=>'nullable|image:jpeg,jpg,png'
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $this->validation($request);
        $validateData['is_active'] = isset($request->is_active) && $request->is_active == 'on' ? true : false;
        $store = Store::create($validateData);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = 'stores'.time().".".$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images/stores',$imageName);
            $store->image = $imagePath;
            $store->save();
        }

        return redirect()->route('store.index')->withSuccess('Record created Successfully.!');
    }


    public function show(Store $store)
    {
        //
    }

    public function edit(Store $store)
    {
        return view('admin.store.edit',compact('store'));
    }


    public function update(Request $request, Store $store)
    {
        $validateData = $this->validation($request,$store);
        $validateData['is_active'] = isset($request->is_active) && $request->is_active == 'on' ? true : false;
        $store->update($validateData);
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = 'stores'.time().".".$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images/stores',$imageName);
            $store->image = $imagePath;
        }
        $store->save();
        return redirect()->route('store.index')->withSuccess('Record updated Successfully.!');
    }

    public function destroy(Store $store)
    {
        $store->delete();
    }
}
