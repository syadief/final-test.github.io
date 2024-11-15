<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Validasi foto profil
        $request->validate([
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $user = $request->user();

        // Simpan data profil yang lain
        $user->fill($request->validated());

        // Simpan foto profil jika ada file yang diunggah
        if ($request->hasFile('photo')) {
            // Hapus foto profil lama jika ada
            if ($user->photo) {
                Storage::disk('public')->delete($user->photo);
            }

            // Simpan foto profil baru
            $profilePhotoPath = $request->file('photo')->store('photo', 'public');
            $user->photo = $profilePhotoPath;
        }

        // Reset email_verified_at jika email diperbarui
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Simpan perubahan ke database
        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}