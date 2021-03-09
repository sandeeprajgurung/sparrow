<?php

namespace App\Http\Controllers;

use App\Models\ExternalServiceDetail;
use App\Models\ExternalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExternalServiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $externalServiceDetails = ExternalServiceDetail::join('external_service', 'external_service_detail.external_service_id', '=', 'external_service.id')
               ->get(['external_service_detail.id', 'external_service.name AS servicename', 'external_service_detail.name', 'external_service_detail.description', 'external_service_detail.image']);
        $externalServices = ExternalService::all('id','name');
        return view('servicedetail.index', compact('externalServiceDetails', 'externalServices'));
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

        $externalServiceDetail = new ExternalServiceDetail;
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('ServiceDetail', $imageName, 'public');
            $externalServiceDetail->image = $path;
        }
        else{
            $externalServiceDetail->image = '';
        }
        $externalServiceDetail->external_service_id = $request->category;
        $externalServiceDetail->name = $request->name;
        $externalServiceDetail->description = $request->description;
        $externalServiceDetail->save();

        return back()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExternalServiceDetail  $externalServiceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ExternalServiceDetail $externalServiceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExternalServiceDetail  $externalServiceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ExternalServiceDetail $externalServiceDetail, $id)
    {
        $externalServiceDetail = ExternalServiceDetail::find($id);
        
        $externalServicesById = ExternalService::find($externalServiceDetail->external_service_id);
        
        $externalServices = ExternalService::all('id','name')
                            ->where('id', '!=', $externalServiceDetail->external_service_id);
                            
        return view('servicedetail.edit',compact('externalServiceDetail', 'externalServicesById', 'externalServices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExternalServiceDetail  $externalServiceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExternalServiceDetail $externalServiceDetail, $id)
    {
        $request->validate([
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $externalServiceDetail = ExternalServiceDetail::find($id);
        if($externalServiceDetail->image){
            \Storage::delete('/public/' . $externalServiceDetail->image);
        }

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('ServiceDetail', $imageName, 'public');
            $externalServiceDetail->image = $path;
        }
        else{
            $externalServiceDetail->image = '';
        }

        $externalServiceDetail->external_service_id = $request->category;
        $externalServiceDetail->name = $request->name;
        $externalServiceDetail->description = $request->description;
        $externalServiceDetail->save();

        return redirect()->route('servicedetail');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExternalServiceDetail  $externalServiceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExternalServiceDetail $externalServiceDetail, $id)
    {
        $externalServiceDetail = ExternalServiceDetail::find($id);
        if($externalServiceDetail->image)
            \Storage::delete('/public/' . $externalServiceDetail->image);
        $externalServiceDetail -> delete();
        return redirect()->route('servicedetail')
                        ->with('success','deleted successfully');
    }
}
