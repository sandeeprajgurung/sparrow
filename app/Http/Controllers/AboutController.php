<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::get();
        return view('admin.views.content', compact('abouts'));
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
         $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);

        $about = new About;
        $about->title=$request->title;
        $about->description=$request->description;
        $about->content=$request->content;
        $about->status=(count($about::get()) == 0 ? 1:0);
        $about->save();

        return redirect()->route('content.about');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about, $id)
    {
        $about = About::find($id);
        return view('admin.views.content',compact('about'));
    }
    public function updateStatus(Request $request, $id)
    {
        $_status = About::where('status', '=', 1)->get();
        if(!empty($_status[0])){
            $_status[0]->status = 0 ;
            $_status[0]->save();
        }

        $about = About::find($id);
        $about->status=$request->status;
        $about->save();
        $abouts = About::get();

        // return view('about.index', compact('abouts'));
        // return redirect()->route('about')
        //                 ->with('success','Updated successfully');
        return redirect()->to('content.about');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required',
            'content' => 'required',
        ]);
        $about = About::find($id);
        $about->title=$request->title;
        $about->description=$request->description;
        $about->content=$request->content;
        $about->save();

        return redirect()->route('content.about')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about, $id)
    {
        $about = About::find($id);
        $about->delete();
        
        return redirect()->route('content.about')
                        ->with('success','Deleted successfully');
    }
}
