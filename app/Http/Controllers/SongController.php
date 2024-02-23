<?php

namespace App\Http\Controllers;

use App\Models\Song;
use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use Illuminate\Support\Facades\Log;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return response()->json($songs);
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
    public function store(StoreSongRequest $request)
    {
        Log::info($request);
        
        $song = Song::create($request->validated());
        Log::info($song);
        
        return response()->json($song, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        return response()->json($song);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        //
    }

    /**
     * Update the specified resource in storage. (?????????????????)
     */
    public function update(UpdateSongRequest $request, Song $song)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return response()->json('The song has been deleted');
    }
}
