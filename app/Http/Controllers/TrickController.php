<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Label;
use App\Models\Trick;
use App\Models\TrickLabel;
use Illuminate\Http\Request;

class TrickController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Retrieve all tricks from the database

        $search = $request->input('search');
        $filter = $request->input('filter');

        $labels = Label::query()->orderBy('name')->get();

        $tricks = Trick::with(['comments', 'labels'])
            ->when($search, function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($filter, function ($query) use ($filter) {
                $query->whereHas('labels', function ($labelQuery) use ($filter) {
                    $labelQuery->whereKey($filter);
                });
            })
            ->get(['id', 'name', 'description', 'image', 'status']);

        return view('tricks.index', compact('tricks', 'labels', 'search', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the form for creating a new trick
        return view('tricks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Store a newly created trick in storage.
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|min:3',
            'image' => 'required',
//            hier komt het label
        ]);

        $trick = new Trick();
        $trick->name = $request->input('name');
        $trick->description = $request->input('description');
        $trick->image = $request->input('image');
        $trick->user_id = 1;

//        hier komt de verbinding met het label

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
    public function edit(Trick $trick)
    {
        // Show the form for editing the specified trick
        return view('tricks.edit', compact('trick'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trick $trick)
    {
        // Update trick in database
        $request->validate([
            'name' => 'required|max:255|min:3',
            'description' => 'required|min:3',
            'image' => 'required',
//            hier komt de label
        ]);

        $trick->name = $request->input('name');
        $trick->description = $request->input('description');
        $trick->image = $request->input('image');

//        hier komt de verbinding met het label

        $trick->save();

        return redirect()->route('tricks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trick $trick)
    {
        // Delete the specified trick
        //hier komt de verbinding met het label
        $labels = TrickLabel::query()->where('trick_id', $trick->id)->get();
        foreach ($labels as $label) {
            $label->delete();
        }
        $comments = Comment::query()->where('trick_id', $trick->id)->get();
        foreach ($comments as $comment) {
            $comment->delete();
        }
        $trick->delete();
        return redirect()->route('tricks.index');
    }
}
