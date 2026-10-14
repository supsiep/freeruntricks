<?php

namespace App\Http\Controllers;

use App\Models\Trick;
use Illuminate\Http\Request;

class TrickController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $trick = new Trick();
        $trick->name = 'front flip';
        $trick->description = 'A front flip is a trick where you flip forward in the air.';
        $trick->image = 'front_flip.jpg';
        $trick->status = true;
        $trick->user_id = 1;

        return view('tricks', compact('trick'));
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
