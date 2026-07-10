<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // $data = DB::table('categories')->get();
        return view('frontend.pages.home');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function schoolBags()
    {
        return view('frontend.pages.projects.school-bags');
    }

    public function buildMasjid()
    {
        return view('frontend.pages.projects.build-masjid');
    }

    public function donateHouse()
    {
        return view('frontend.pages.projects.donate-house');
    }

    public function donateQuran()
    {
        return view('frontend.pages.projects.donate-quran');
    }

    public function emergencyAid()
    {
        return view('frontend.pages.projects.emergency-aid');
    }

    public function feedDaily()
    {
        return view('frontend.pages.projects.feed-daily');
    }

    public function tubewell()
    {
        return view('frontend.pages.projects.tubewell');
    }

    public function healingBangladesh()
    {
        return view('frontend.pages.projects.healing-bangladesh');
    }

    public function incomeGenerating()
    {
        return view('frontend.pages.projects.income-generating');
    }

    public function sponsoredYateem()
    {
        return view('frontend.pages.projects.sponsored-yateem');
    }

    public function donation()
    {
        return view('frontend.pages.donation');
    }
}
