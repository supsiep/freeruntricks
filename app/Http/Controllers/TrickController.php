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

        // Retrieve all tricks from the database
        $tricks = Trick::with('comments')->get(['id', 'name', 'description', 'image']);
//        $tricks = Trick::all('id', 'name', 'description', 'image');

        return view('tricks.index', compact('tricks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('tricks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|min:3',
            'image' => 'required',
        ]);

        $trick = new Trick();
        $trick->name = $request->input('name');
        $trick->description = $request->input('description');
        $trick->image = $request->input('image');
        $trick->user_id = 1;

        $trick->save();

        return redirect(route('tricks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Trick $trick)
    {
        // Display the specified trick

        $trick->load('comments');
        return view('tricks.show', compact('trick'));
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
