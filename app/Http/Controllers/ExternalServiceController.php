<?php

namespace App\Http\Controllers;

use App\Models\ExternalService;
use Illuminate\Http\Request;

class ExternalServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $externalServices = ExternalService::all();
        return view('admin.views.content', compact('externalServices'));
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
            'name' => 'required',
            'description' => 'required',
        ]);
        ExternalService::create($request->all());
        return redirect()->route('content.service');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExternalService  $externalService
     * @return \Illuminate\Http\Response
     */
    public function show(ExternalService $externalService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExternalService  $externalService
     * @return \Illuminate\Http\Response
     */
    public function edit(ExternalService $externalService, $id)
    {
        $externalService = ExternalService::find($id);
        return view('admin.views.content',compact('externalService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExternalService  $externalService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);
        $externalService = ExternalService::find($id);
        $externalService->name=$request->name;
        $externalService->icon=$request->icon;
        $externalService->description=$request->description;
        $externalService->save();

        return redirect()->route('content.service')
                        ->with('success','FAQ updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExternalService  $externalService
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExternalService $externalService, $id)
    {
        $externalService = ExternalService::find($id);
        $externalService->delete();
        
        return redirect()->route('content.service')
                        ->with('success','Contact deleted successfully');
    }
}
