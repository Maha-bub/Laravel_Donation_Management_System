<?php

namespace App\Http\Controllers;

use App\Models\CampaignList;
use App\Models\Category;
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
        $categories = Category::all();
        return view('admin.campaigns.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:250',
            'goal_amount' => 'required|numeric',
            'status' => 'nullable|boolean',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $campaigns = new CampaignList;
        $campaigns->name = $request->name;
        $campaigns->category_id = $request->category_id;
        $campaigns->description = $request->description;
        $campaigns->goal_amount = $request->goal_amount;
        $campaigns->status = $request->status;

        $randomNum = rand(0, 50);
        $photoExt = $request->photo->extension();
        $photoName = $randomNum . time() . '.' . $photoExt;
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
        $categories = Category::all();
        return view('admin.campaigns.edit', compact('campaignList', 'categories'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CampaignList $campaignList)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string|max:250',
            'goal_amount' => 'required|numeric',
            'status' => 'nullable|boolean',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $campaignList->name = $request->name;
        $campaignList->category_id = $request->category_id;
        $campaignList->description = $request->description;
        $campaignList->goal_amount = $request->goal_amount;
        $campaignList->status = $request->status;

        if ($request->hasFile('photo')) {
            $oldPath = public_path('images/' . $campaignList->image);
            if ($campaignList->image && file_exists($oldPath)) {
                @unlink($oldPath);
            }

            $randomNum = rand(0, 50);
            $photoExt = $request->photo->extension();
            $photoName = $randomNum . time() . '.' . $photoExt;
            $request->photo->move(public_path('images'), $photoName);

            $campaignList->image = $photoName;
        }

        $campaignList->save();

        return redirect()->route('campaignlist.index')->with('success', 'Campaign updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CampaignList $campaignList)
    {
        $path = public_path('images/' . $campaignList->image);
        if ($campaignList->image && file_exists($path)) {
            @unlink($path);
        }

        $campaignList->delete();

        return redirect()->route('campaignlist.index')->with('success', 'Campaign deleted successfully!!');
    }
}
