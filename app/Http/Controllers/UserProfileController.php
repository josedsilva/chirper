<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chirp;

class UserProfileController extends Controller
{
    public function profile()
    {
        $chirps = Chirp::where('user_id', auth()->user()->id)
            ->latest()
            ->lazy();
        
        return view('profile', compact('chirps'));
    }
}
