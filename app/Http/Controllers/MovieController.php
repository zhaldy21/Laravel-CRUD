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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Temukan film berdasarkan ID
        $movie = Movie::findOrFail($id);

        // Ambil semua genre
        $genres = Genre::all();

        // Tampilkan view edit dengan data film dan genre
        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified movie in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'year' => 'required|integer|min:1800|max:' . date('Y'),
            'available' => 'nullable|boolean',
            'genre_id' => 'required|exists:genres,id',
        ]);

        // Temukan film berdasarkan ID
        $movie = Movie::findOrFail($id);

        // Update data film
        $movie->title = $validatedData['title'];
        $movie->synopsis = $validatedData['synopsis'];
        $movie->year = $validatedData['year'];
        $movie->available = $request->has('available') ? 1 : 0;
        $movie->genre_id = $validatedData['genre_id'];

        // Simpan poster baru
        if ($request->hasFile('poster')) {
            $file = $request->file('poster');
            $fileName = uniqid() . '_' . str_replace(' ', '_', $validatedData['title']) . '.' . $file->getClientOriginalExtension();
            $folder = public_path('images/');
            $filePath = $folder . $fileName;

            // Hapus file lama hanya jika ada dan sesuai path
            if ($movie->poster && file_exists(public_path($movie->poster))) {
                unlink(public_path($movie->poster));
            }

            // Simpan file baru
            $file->move($folder, $fileName);
            $movie->poster = 'images/' . $fileName;
        }


        // Simpan perubahan
        $movie->save();

        // Redirect dengan pesan sukses
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully!');
    }

    public function show($id)
    {
        // Ambil data film berdasarkan ID
        $movie = Movie::findOrFail($id);

        // Ambil daftar genre untuk ditampilkan (jika diperlukan)
        $genres = Genre::all();

        // Tampilkan view dengan data film
        return view('movies.view', compact('movie', 'genres'));
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
