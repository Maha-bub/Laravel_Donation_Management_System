<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class VolunteerManageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Volunteer::with('user')->latest()->get();
        return view('admin.crud.volunteer.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.crud.volunteer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|string|max:50',
            'address' => 'nullable|string|max:255',
            'task' => 'nullable|string|max:150',
            'status' => 'required|in:active,inactive',
            'joining_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = 'default.png';
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('volunteers', 'public');
        }

        DB::transaction(function () use ($request, $imagePath) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'volunteer',
            ]);

            Volunteer::create([
                'user_id' => $user->id,
                'phone' => $request->phone,
                'address' => $request->address,
                'task' => $request->task,
                'status' => $request->status,
                'joining_date' => $request->joining_date,
                'image' => $imagePath,
            ]);
        });

        return redirect()->route('admin.volunteerlist.index')->with('success', 'Volunteer added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Volunteer $volunteerlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Volunteer $volunteerlist)
    {
        $volunteerlist->load('user');
        return view('admin.crud.volunteer.edit', compact('volunteerlist'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Volunteer $volunteerlist)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . $volunteerlist->user_id,
            'password' => 'nullable|string|min:6|confirmed',
            'phone' => 'required|string|max:50',
            'address' => 'nullable|string|max:255',
            'task' => 'nullable|string|max:150',
            'status' => 'required|in:active,inactive',
            'joining_date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = $volunteerlist->image;
        if ($request->hasFile('image')) {
            if ($volunteerlist->image && $volunteerlist->image !== 'default.png') {
                Storage::disk('public')->delete($volunteerlist->image);
            }
            $imagePath = $request->file('image')->store('volunteers', 'public');
        }

        DB::transaction(function () use ($request, $volunteerlist, $imagePath) {
            $userData = [
                'name' => $request->name,
                'email' => $request->email,
            ];

            if ($request->filled('password')) {
                $userData['password'] = Hash::make($request->password);
            }

            $volunteerlist->user()->update($userData);

            $volunteerlist->update([
                'phone' => $request->phone,
                'address' => $request->address,
                'task' => $request->task,
                'status' => $request->status,
                'joining_date' => $request->joining_date,
                'image' => $imagePath,
            ]);
        });

        return redirect()->route('admin.volunteerlist.index')->with('success', 'Volunteer updated successfully!');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Volunteer $volunteerlist)
    {
        if ($volunteerlist->image && $volunteerlist->image !== 'default.png') {
            Storage::disk('public')->delete($volunteerlist->image);
        }

        $user = $volunteerlist->user;
        $volunteerlist->delete();

        if ($user) {
            $user->delete();
        }

        return redirect()->route('admin.volunteerlist.index')->with('success', 'Volunteer deleted successfully!');
    }
}
