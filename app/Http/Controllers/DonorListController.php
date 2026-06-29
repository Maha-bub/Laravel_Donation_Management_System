<?php

namespace App\Http\Controllers;

use App\Models\DonorList;
use Illuminate\Http\Request;

class DonorListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $donor = DonorList::all();
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
            'name'  => 'required|string|max:100',
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
            'name'  => $request->name,
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
    public function show(DonorList $donorList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DonorList $donorList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DonorList $donorList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DonorList $donorList)
    {
        //
    }
}
