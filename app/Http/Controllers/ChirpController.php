<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ChirpController extends Controller
{
    use AuthorizesRequests;
    
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
        
        // create this chirp on the authenticated user
        auth()->user()->chirps()->create([
            'message' => $validated['chirp'],
        ]);
        
        // Redirect back to the feed with flashed data
        return redirect('/')->with('toast', [
            'type' => 'success',
            'message' => 'Your chirp was created!',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        
        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        
        $validated = $request->validate([
            'chirp' => 'required|string|max:255|min:5',
        ], [
            'chirp.required' => 'Please write something to chirp!',
            'chirp.max' => 'Chirps must be 255 characters or less.',
            'chirp.min' => 'Chirps must be at least 5 characters.',
        ]);
        
        $chirp->update([
            'message' => $validated['chirp'],
        ]);
        
        // Redirect back to the feed with flashed data
        return redirect('/')->with('toast', [
            'type' => 'success',
            'message' => 'Your chirp was updated!',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);
        
        $chirp->delete();
        
        return redirect('/')->with('toast', [
            'type' => 'success',
            'message' => 'Your chirp was deleted!',
        ]);
    }
}
