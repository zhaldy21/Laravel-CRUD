<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genreId = $request->get('genre');
        $genres = Genre::select('id', 'name')->get();

        $movies = Movie::with('genre')
            ->when($genreId, function ($query, $genreId) {
                return $query->where('genre_id', $genreId);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('movies.index', compact('movies', 'genres', 'genreId'));
    }

    public function create()
    {
        $movies = Movie::with('genre')->get();
        $genres = Genre::select('id', 'name')->get();
        return view('movies.create', compact('movies', 'genres'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'poster' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'genre_id' => 'required|exists:genres,id',
            'available' => 'nullable|boolean',
        ]);

        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $fileName = str_replace(' ', '_', $validatedData['title']) . '.' . $file->getClientOriginalExtension();
            $folder = public_path('images/');
            $file->move($folder, $fileName);
            $validatedData['poster'] = 'images/' . $fileName;
        }

        $validatedData['id'] = (string) Str::uuid();

        logger()->info('Validated Data: ', $validatedData);


        Movie::create($validatedData);

        return redirect()->route('movies.index')->with('success', 'Movie created successfully!');
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
    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
