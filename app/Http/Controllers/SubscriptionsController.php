<?php

namespace App\Http\Controllers;

use App\Model\Subscriptions;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscriptions::orderByDesc('updated_at')->paginate(10);
        return view('admin.subscription.list',compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriptions $subscriptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subscriptions = Subscriptions::find($id);
        return view('admin.subscription.edit',compact('subscriptions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email'=>'required'
        ]);
        $subscriptions = Subscriptions::find($id);
        $subscriptions->email = $request->email;
        $subscriptions->is_subscribed = $request->is_subscribed == 'on' ? true : false;
        $subscriptions->save();

        return redirect()->route('subscriptions.index')->withSuccess('Record updated successfully.!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Subscriptions  $subscriptions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subscriptions::where('id',$id)->delete();
        return redirect()->route('subscriptions.index')->withSuccess('Record deleted successfully.!');
    }
}
