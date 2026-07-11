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
            'name' => 'required|string|max:100',
            'payment_method' => 'required|string|max:100',
            'campaign_id' => 'required|exists:campaign_lists,id',
            'amount' => 'required|numeric|min:1',
        ]);

        Donations::create([
            'name' => $request->name,
            'campaign_id' => $request->campaign_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ]);

        return redirect()->route('admin.donations.index')->with('success', 'Donation created successfully!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Donations $donation)
    {
        return view('admin.donations.show', ['item' => $donation]);
    }

    /**
     * Show the form for editing the specified resource.
     */


    public function edit(Donations $donation)
    {
        $campaigns = CampaignList::all();

        return view('admin.donations.edit', [
            'item' => $donation,
            'campaigns' => $campaigns,
        ]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Donations $donation)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'payment_method' => 'required|string|max:100',
            'campaign_id' => 'required|exists:campaign_lists,id',
            'amount' => 'required|numeric|min:1'
        ]);

        $donation->update([
            'name' => $request->name,
            'campaign_id' => $request->campaign_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
        ]);
        return redirect()->route('admin.donations.index')->with('success', 'Donation updated successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $donation = Donations::findOrFail($id);
        $donation->delete();
        return redirect()->route('admin.donations.index')->with('success', 'Donation deleted successfully!!');
    }
}
