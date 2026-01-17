<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conferences = Conference::paginate(10);

        return view('conferences.index', ['conferences' => $conferences]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Conference $conference)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conference $conference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Conference $conference)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conference $conference)
    {
        //
    }

    public function favorite(Conference $conference)
    {
        $user = auth()->user();

        if ($user->favoritedConferences()->where('conference_id', $conference->id)->exists()) {
            $user->favoritedConferences()->detach($conference->id);
        } else {
            $user->favoritedConferences()->attach($conference->id);
        }

        return redirect()->back();
    }
}
