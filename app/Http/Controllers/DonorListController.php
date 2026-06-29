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
        //
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
