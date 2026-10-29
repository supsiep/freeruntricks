<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        if (auth()->check() && auth()->user()->id == $id) {
            //alle info van user
            $user = User::find($id);
            return view('myprofile.edit', compact('user'));
        }
        return redirect(route('tricks.index'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateInfo(Request $request)
    {
        $user = $request->user();
        //
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);
        return redirect(route('myprofile.edit', $user->id));
    }

    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
