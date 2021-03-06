<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
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
        $testimonials = Testimonial::all();
        return view('testimonial.index', compact('testimonials'));
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
        $request->validate([
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $testimonial = new Testimonial;
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('Testimonial', $imageName, 'public');
            $testimonial->image = $path;
        }
        else{
            $testimonial->image = '';
        }

        $testimonial->name = $request->name;
        $testimonial->organization = $request->organization;
        $testimonial->statement = $request->statement;
        $testimonial->save();

        return redirect()->route('testimonial');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial, $id)
    {
        $testimonial = Testimonial::find($id);
        return view('testimonial.edit',compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $testimonial = Testimonial::find($id);
        if($testimonial->image){
            \Storage::delete('/public/' . $testimonial->image);
        }

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('Testimonial', $imageName, 'public');
            $testimonial->image = $path;
        }
        else{
            $testimonial->image = '';
        }

        $testimonial->name = $request->name;
        $testimonial->organization = $request->organization;
        $testimonial->statement = $request->statement;
        $testimonial->save();

        return redirect()->route('testimonial');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial, $id)
    {
        $testimonial = Testimonial::find($id);
        if($testimonial->image)
            \Storage::delete('/public/' . $testimonial->image);
        $testimonial -> delete();
        return redirect()->route('testimonial');
    }
}
