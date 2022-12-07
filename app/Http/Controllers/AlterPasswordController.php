<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

class AlterPasswordController extends Controller
{
    public function show()
    {
        return view('auth.alter-password');
    }

    public function update(ProfileUpdateRequest $request)
    {
        
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'pronoun' => $request->pronoun,
            'bio' => $request->bio,
            'date' => $request->date,
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}

