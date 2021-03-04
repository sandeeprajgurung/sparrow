<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Home;
use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        // $request->validate([
        //     'title' => 'required|max:255',
        //     'description' => 'required|max:255',
        //     'file_upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        // ]);
        // die('here');

        $home = new Home ([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ]);

        $image = $request->file('file_upload');
        // Make a image name based on user name and current timestamp
        $name = Str::slug($request->input('name')).'_'.time();
        // Define folder path
        $folder = 'admin/home/uploads';
        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
        // Upload image
        $this->uploadOne($image, $folder, 'public', $name);
        // Set user profile image path in database to filePath
        $home->file_upload = $filePath;
        $home->status = 1;
        DB::table('homes')->where('status', '=', 1)->update(array('status' => 0));
        $home->save();

        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
