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
        $externalService = ExternalService::all();
        return view('ExternalService.index', compact('externalService'));
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
        ExternalService::create($request->all());
        return redirect()->route('ExternalService');
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
    public function edit(ExternalService $externalService)
    {
        $externalService = ExternalService::find($id);
        return view('ExternalService.edit',compact('externalService'));
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
        $externalService->description=$request->description;
        $externalService->save();

        return redirect()->route('ExternalService')
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
        
        return redirect()->route('ExternalService')
                        ->with('success','Contact deleted successfully');
    }
}