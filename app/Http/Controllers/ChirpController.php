<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;
use App\Models\User;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')
            ->latest()
            ->take(10)
            ->get();
        
        return view('home', ['chirps' => $chirps]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'chirp' => 'required|string|max:255|min:5',
        ], [
            'chirp.required' => 'Please write something to chirp!',
            'chirp.max' => 'Chirps must be 255 characters or less.',
            'chirp.min' => 'Chirps must be at least 5 characters.',
        ]);
        
        // create this chirp for a random author for now until auth is implemented.
        User::inRandomOrder()->first()->chirps()->create([
            'message' => $validated['chirp'],
        ]);
        
        // Redirect back to the feed with flashed data
        return redirect('/')->with('toast', [
            'type' => 'success',
            'message' => 'Your chirp was created!',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
