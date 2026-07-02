<?php

namespace App\Http\Controllers;

use App\Models\DonorList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DonorListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donor = DonorList::with('donations')->get();
        return view('admin.crud.index', (['items' => $donor]));
        // dd($donor);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:50',
            'total' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = 'default.png';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('donors', 'public');
        }

        DonorList::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'total' => $request->total,
            'image' => $imagePath,
        ]);

        return redirect()->route('donorlist.index')->with('success', 'Donor added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(DonorList $donorlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonorList $donorlist)
    {
        return view('admin.crud.edit', compact('donorlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DonorList $donorlist)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:50',
            'total' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $donorlist->image;

        if ($request->hasFile('image')) {
            if ($donorlist->image && $donorlist->image !== 'default.png') {
                Storage::disk('public')->delete($donorlist->image);
            }
            $imagePath = $request->file('image')->store('donors', 'public');
        }

        $donorlist->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'total' => $request->total,
            'image' => $imagePath,
        ]);

        return redirect()->route('donorlist.index')->with('success', 'Donor updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonorList $donorlist)
    {
        if ($donorlist->image && $donorlist->image !== 'default.png') {
            Storage::disk('public')->delete($donorlist->image);
        }

        $donorlist->delete();

        return redirect()->route('donorlist.index')->with('success', 'Donor deleted successfully!');
    }

    /**
     * Record a new donation entry for a donor (used from the "View" modal on the donor list).
     */
    public function storeDonation(Request $request, DonorList $donorlist)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'donation_date' => 'required|date',
            'note' => 'nullable|string|max:255',
        ]);

        $donorlist->donations()->create([
            'amount' => $request->amount,
            'donation_date' => $request->donation_date,
            'note' => $request->note,
        ]);

        // keep the donor's total in sync with the sum of all recorded donations
        $donorlist->update([
            'total' => $donorlist->donations()->sum('amount'),
        ]);

        return redirect()->route('donorlist.index')->with('success', 'Donation recorded successfully!');
    }
}
