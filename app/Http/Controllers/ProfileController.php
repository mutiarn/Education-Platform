<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function settings()
    {
        return view('profile.profile', [
            'title' => 'Profile Settings',
            'user' => Auth::user(),
        ]);
    }

    public function edit()
    {
        return view('profile.edit', [
            'title' => 'Edit Profile',
            'user' => Auth::user(),
        ]);
    }

    // updateProfile & updatePassword tinggal lanjutkan di sini
}
