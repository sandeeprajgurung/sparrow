<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Home;
use App\Models\Team;
use App\Models\Service;
use App\Models\Contact;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function home() {
        $home = Home::get()->where('status', '=', '1');
        $services = Service::get();
        $teams = Team::all();
        $contact = Contact::get();
        $faqs = FAQ::all();
        // dd($contact);
        return view('frontend.pages.home')->with(compact('home', 'services', 'teams', 'contact', 'faqs'));
    }

    public function services() {
        return view('frontend.pages.services');
    }
}
