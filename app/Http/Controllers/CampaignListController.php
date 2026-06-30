<?php

namespace App\Http\Controllers;

use App\Models\CampaignList;
use Illuminate\Http\Request;

class CampaignListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $campaigns=CampaignList::all();
       return view('admin.campaigns.index',['items'=>$campaigns]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CampaignList $campaignList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CampaignList $campaignList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampaignList $campaignList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CampaignList $campaignList)
    {
        //
    }
}
