<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TalkResource;
use App\Models\Talk;
use Illuminate\Http\Request;

class TalkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $talks = Talk::where('user_id', $request->user()->id)->paginate($request->get('per_page', 15));

        return TalkResource::collection($talks);
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
    public function show(Talk $talk) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Talk $talk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Talk $talk)
    {
        //
    }
}
