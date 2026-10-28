<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Label;
use App\Models\Trick;
use App\Models\TrickLabel;
use Illuminate\Http\Request;
use function Laravel\Prompts\confirm;

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

        //check voor 3 keer hebben gecomment
        if (auth()->check()) {
            $userId = auth()->user()->id;
            $commentCount = Comment::query()->where('user_id', $userId)->count();

            if ($commentCount == 3) {
                $labels = Label::all();
                return view('tricks.create', compact('labels'));
            } else {
                return redirect()->route('tricks.index')->with('error', 'You do not have permission to create tricks. You need to have 3 comments posted!');
            }
        }


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
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'label' => 'required|exists:labels,id'
        ]);

        $trick = new Trick();
        $trick->name = $request->input('name');
        $trick->description = $request->input('description');
        $trick->image = $request->file('image')->store('tricks', 'public');
        $trick->user_id = auth()->user()->id;

        $trick->save();
        $trick->labels()->attach($request->input('label'));

        return redirect(route('tricks.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Trick $trick)
    {
        // Display the specified trick
        $trick->load('comments.user');
        return view('tricks.show', compact('trick'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trick $trick)
    {
        if (auth()->user()->role === 'admin') {
            $labels = Label::all();
            return view('tricks.edit', compact('trick', 'labels'));
        }
        if (auth()->id() !== $trick->user_id) {
            abort(404);
        } else {
            $labels = Label::all();
            // Show the form for editing the specified trick
            return view('tricks.edit', compact('trick', 'labels'));
        }
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
            'image' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
            'label' => 'required|exists:labels,id'
        ]);

        $trick->name = $request->input('name');
        $trick->description = $request->input('description');
        if ($request->hasFile('image')) {
            $trick->image = $request->file('image')->store('tricks', 'public');
        }

        $trick->labels()->sync([$request->input('label')]);

        $trick->save();

        return redirect()->route('tricks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trick $trick)
    {
        // Delete the specified trick
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

    /**
     * Update the status of the specified resource.
     */
    public function status(Trick $trick) {
        $trick->status = $trick->status === 1 ? 0 : 1;
        $trick->save();

        return redirect()->back();
    }
}


