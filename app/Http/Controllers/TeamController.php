<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('team.index', compact('teams'));
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

        $team = new Team;
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('Team', $imageName, 'public');
            $team->image = $path;
        }
        else{
            $team->image = '';
        }

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->save();

        return back()->with('success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team, $id)
    {
        $team = Team::find($id);
        return view('team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
          'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $team = Team::find($id);
        if($team->image){
            \Storage::delete('/public/' . $team->image);
        }

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $path = $image->storeAs('Team', $imageName, 'public');
            $team->image = $path;
        }
        else{
            $team->image = '';
        }

        $team->name = $request->name;
        $team->designation = $request->designation;
        $team->save();

        return redirect()->route('team');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team, $id)
    {
        
        $team = Team::find($id);
        if($team->image)
            \Storage::delete('/public/' . $team->image);
        $team -> delete();
        return redirect()->route('team')
                        ->with('success','deleted successfully');
    }
}
