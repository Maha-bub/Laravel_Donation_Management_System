<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class VolunteerController extends Controller
{
     public function dashboard()
    {
        $user = Auth::user();
        $volunteer = $user->volunteer;

        return view('volunteer.dashboard', compact('user', 'volunteer'));
    }

    /**
     * Show the logged-in volunteer's own profile.
     */
    public function profile()
    {
        $user = Auth::user();
        $volunteer = $user->volunteer;

        return view('volunteer.profile.show', compact('user', 'volunteer'));
    }

    /**
     * Show the form to edit the logged-in volunteer's own profile.
     */
    public function editProfile()
    {
        $user = Auth::user();
        $volunteer = $user->volunteer;

        return view('volunteer.profile.edit', compact('user', 'volunteer'));
    }

    /**
     * Update the logged-in volunteer's own profile information.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $volunteer = $user->volunteer;

        if ($volunteer) {
            $imagePath = $volunteer->image;

            if ($request->hasFile('image')) {
                if ($volunteer->image && $volunteer->image !== 'default.png') {
                    Storage::disk('public')->delete($volunteer->image);
                }
                $imagePath = $request->file('image')->store('volunteers', 'public');
            }

            $volunteer->update([
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $imagePath,
            ]);
        }

        return redirect()->route('volunteer.profile')->with('success', 'Profile updated successfully!');
    }

    /**
     * Update the logged-in volunteer's own password.
     */
    public function updatePassword(Request $request)
    {
        $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $request->user()->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password updated successfully!');
    }
}
