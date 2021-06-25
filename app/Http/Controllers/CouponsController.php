<?php

namespace App\Http\Controllers;

use App\Model\Coupons;
use Illuminate\Http\Request;

class CouponsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupons::orderByDesc('updated_at');

        if(isset($request->name) && $request->name != ''){
            $coupons = $coupons->where('name', 'like', '%'. $request->name.'%');
        }
        if(isset($request->status) && $request->status != ''){
            $banners = $coupons->where('is_active',$request->status);
        }
        $coupons = $coupons->paginate(10);
        return view('admin.coupon.list',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupon.create');
    }


    public function validation($request)
    {
        return $validateData = $request->validate([
            'name'=>'required',
            'code'=>'required',
            'type'=>'required',
            'method'=>'required',
            'amount'=>'required',
            'start_date_time'=>'required',
            'end_date_time'=>'required',
            'description'=>'required',
            'max_total_usage'=>'required',
            'maximum_discount_amount'=>'nullable',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $this->validation($request);
        $validateData['is_active'] = $request->is_active == 'on' ? true : false;
        $coupon = Coupons::create($validateData);
        return redirect()->route('coupon.index')->withSuccess("Record inserted successfully.!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function show(Coupons $coupons)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Coupons  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupons $coupon)
    {
        return view('admin.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Coupons  $coupons
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupons $coupon)
    {
        $validateData = $this->validation($request);
        $validateData['is_active'] = $request->is_active == 'on' ? true : false;
        $validateData['start_date_time'] = date('Y-m-d H:i:s', strtotime($validateData['start_date_time']));
        $validateData['end_date_time'] = date('Y-m-d H:i:s', strtotime($validateData['end_date_time']));
        $coupon = Coupons::where(['id'=>$coupon->id])->update($validateData);
        return redirect()->route('coupon.index')->withSuccess("Record updated successfully.!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Coupons  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupons $coupon)
    {
        $coupon->delete();
        return redirect()->route('coupon.index')->withSuccess("Record deleted successfully.!");
    }
}
