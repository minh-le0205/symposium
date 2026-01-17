<?php

namespace App\Http\Controllers;

use App\Enums\TalkType;
use App\Models\Talk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talks = Auth::user()->talks()->get();

        return view('talks.index', ['talks' => $talks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('talks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'length' => 'nullable',
            'type' => ['required', Rule::enum(TalkType::class)],
            'abstract' => 'nullable',
            'organizer_notes' => 'nullable',
        ]);

        // Create talk
        Auth::user()->talks()->create($validated);

        return redirect()->route('talks.index')->with('success', 'Talk created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Talk $talk)
    {
        return view('talks.show', ['talk' => $talk]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Talk $talk)
    {
        return view('talks.edit', ['talk' => $talk]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Talk $talk)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'length' => 'nullable',
            'type' => ['required', Rule::enum(TalkType::class)],
            'abstract' => 'nullable',
            'organizer_notes' => 'nullable',
        ]);

        if (Auth::user()->id !== $talk->user_id) {
            abort(403, 'Unauthorized action.');
        }
        $talk->update($validated);

        return redirect()->route('talks.show', $talk)->with('success', 'Talk updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talk $talk)
    {
        if (Auth::user()->id !== $talk->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $talk->delete();

        return redirect()->route('talks.index')->with('success', 'Talk deleted successfully.');
    }
}
