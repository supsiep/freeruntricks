<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Trick;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (auth()->user()->role === 'admin') {
            $search = $request->input('search');
            $filter = $request->input('filter');

            $labels = Label::query()->orderBy('name')->get();

            $tricks = Trick::with(['comments', 'labels', 'user'])
                ->when($search, function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                })
                ->when($filter, function ($query) use ($filter) {
                    $query->whereHas('labels', function ($labelQuery) use ($filter) {
                    $labelQuery->whereKey($filter);
                });
                })
                ->get();

            return view('admin.index', compact('tricks', 'labels', 'search', 'filter'));
        } else {
            abort(404);
        }
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
