<?php

namespace App\Http\Controllers;

use App\Models\CampaignList;
use App\Models\Donations;
use Illuminate\Http\Request;

class DonationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donationData = Donations::all();
        return view('admin.donations.index', ['items' => $donationData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $campaign = CampaignList::all();
        // dd($campaign);
        return view('admin.donations.create', ['campains' => $campaign]);
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'require|string|max:100',
            'payment_method' => 'required|string|max:100',
            'amount' => 'required|string|max:100'
        ]);

        Donations::create([
            'name' => $request->name,
            'campaign_id' => $request->campaign_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('donations.index')->with('success', 'Donation created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donations $donations)
    {
        return view('admin.donations.show', ['item' => $donations]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Donations $donations)
    {
        return view('admin.donations.edit', ['item' => $donations]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donations $donations)
    {
        $request->validate([
            'name' => 'require|string|max:100',
            'payment_method' => 'required|string|max:100',
            'amount' => 'required|string|max:100'
        ]);

        $donations->update([
            'name' => $request->name,
            'campaign_id' => $request->campaign_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ]);
        return redirect()->route('donations.index')->with('success', 'Donation updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Donations $donations)
    {
        $donations->delete();
        return redirect()->route('donations.index')->with('success', 'Donation deleted successfully!!');    
    }
}
