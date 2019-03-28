<?php

namespace App\Http\Controllers;

use App\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Artist::all()->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // rwhite: untested (outside of scope!)

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // rwhite: untested (outside of scope!)
        $request->validate([
            'artist_name' => 'required',
        ]);

        $artist = Artist::create($request->all());

        return response()->json([
            'message' => 'Success! New artist created',
            'artist' => $artist
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        // rwhite: untested (outside of scope!)
        return $artist->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function edit(Artist $artist)
    {
        // rwhite: untested (outside of scope!)
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        // rwhite: untested (outside of scope!)
        $request->validate([
            'artist_name'=>'required',
        ]);
        $artist->update($request->all());

        return response()->json([
            'message' => 'Success! Artist updated',
            'task' => $artist,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        // rwhite: untested (outside of scope!)
    }
}
