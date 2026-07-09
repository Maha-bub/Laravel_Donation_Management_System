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
}