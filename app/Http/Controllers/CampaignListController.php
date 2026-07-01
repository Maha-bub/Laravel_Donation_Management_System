<?php

namespace App\Http\Controllers;

use App\Models\CampaignList;
use Directory;
use Illuminate\Http\Request;

class CampaignListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campaigns = CampaignList::all();
        return view('admin.campaigns.index', ['items' => $campaigns]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.campaigns.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
            'category' => 'required|string|max:50',
            'description' => 'nullable|string|max:250',
            'goal_amount' => 'required|numeric',
            'status' => 'nullable|boolean',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $campaigns = new CampaignList;
        $campaigns->name = $request->name;
        $campaigns->category = $request->category;
        $campaigns->description = $request->description;
        $campaigns->goal_amount = $request->goal_amount;
        $campaigns->status = $request->status;

        $randomNum = rand(0, 50);
        $photoExt = $request->photo->extension();
        $photoName = $randomNum . '.' . $photoExt;
        $request->photo->move(public_path('images'), $photoName);

        $campaigns->image = $photoName;
        $campaigns->save();
        return redirect()->route('campaignlist.index')->with('success', 'Campaign created successfully!!');
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
        return view('admin.campaigns.edit', compact('campaignList'));
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
