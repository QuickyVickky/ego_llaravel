<?php

namespace App\Http\Controllers;

use App\Model\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderByDesc('updated_at')->paginate(10);
        return view('admin.testimonial.list',compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name'=>'required',
            'company_name'=>'required',
            'designation'=>'required',
            'comment'=>'required',
            'image'=>'nullable|image:jpeg,jpg,png'
        ]);
        $testimonial = Testimonial::create($validateData);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'_testimonial.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images/testimonial',$imageName);
            $testimonial->image = $imagePath;
            $testimonial->save();
        }
        $testimonial->status = $request->status == 'on' ? true:false;
        return redirect()->route('testimonial.index')->withSuccess('Record created Successfully.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $validateData = $request->validate([
            'name'=>'required',
            'company_name'=>'required',
            'designation'=>'required',
            'comment'=>'required',
            'image'=>'nullable|image:jpeg,jpg,png'
        ]);
        $testimonial->update($validateData);

        if ($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'_testimonial.'.$image->getClientOriginalExtension();
            $imagePath = $image->storeAs('images/testimonial',$imageName);
            $testimonial->image = $imagePath;
        }

        $testimonial->status =  isset($request->status) ? true:false;
        $testimonial->save();

        return redirect()->route('testimonial.index')->withSuccess('Record updated Successfully.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('testimonial.index')->withSuccess('Record deleted Successfully.!');
    }
}
