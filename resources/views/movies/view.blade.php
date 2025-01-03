@extends('layouts.index')
@section('content')

<div class="max-w-3xl mx-auto mt-8 p-6 bg-white rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">View Movie</h2>

    <!-- Form readonly untuk melihat film -->
    <form>
        <!-- Input Title -->
        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
            <input type="text" id="title" name="title" 
                   value="{{ $movie->title }}"
                   class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-100 text-sm focus:ring-0 focus:border-gray-300" 
                   readonly>
        </div>
    
        <!-- Input Synopsis -->
        <div class="mb-4">
            <label for="synopsis" class="block mb-2 text-sm font-medium text-gray-900">Synopsis</label>
            <textarea id="synopsis" name="synopsis" rows="4"
                      class="block w-full p-2.5 text-sm text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-0 focus:border-gray-300" 
                      readonly>{{ $movie->synopsis }}</textarea>
        </div>
    
        <!-- Poster -->
        <div class="mb-4">
            <label for="poster" class="block mb-2 text-sm font-medium text-gray-900">Poster</label>
            @if ($movie->poster)
                <div class="mt-2">
                    <img src="{{ asset($movie->poster) }}" alt="Movie Poster" class="mt-4 max-w-xs rounded shadow">
                </div>
            @else
                <p class="text-sm text-gray-500">No poster available.</p>
            @endif
        </div>
    
        <!-- Input Year -->
        <div class="mb-4">
            <label for="year" class="block mb-2 text-sm font-medium text-gray-900">Year</label>
            <input type="number" id="year" name="year" 
                   value="{{ $movie->year }}"
                   class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-100 text-sm focus:ring-0 focus:border-gray-300" 
                   readonly>
        </div>
    
        <!-- Available -->
        <div class="mb-4">
            <label for="available" class="flex items-center">
                <input id="available" name="available" type="checkbox" value="1" 
                       {{ $movie->available ? 'checked' : '' }}
                       class="w-4 h-4 border border-gray-300 rounded bg-gray-100 focus:ring-0" 
                       disabled>
                <span class="ml-2 text-sm font-medium text-gray-900">Available</span>
            </label>
        </div>
    
        <!-- Genre -->
        <div class="mb-4">
            <label for="genre_id" class="block mb-2 text-sm font-medium text-gray-900">Genre</label>
            <select id="genre_id" name="genre_id" 
                    class="block w-full p-2.5 text-sm text-gray-900 bg-gray-100 border border-gray-300 rounded-lg focus:ring-0 focus:border-gray-300" 
                    disabled>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ $movie->genre_id == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <!-- Back Button -->
        <div class="mt-6 flex justify-between">
            <a href="{{ route('movies.index') }}" 
               class="w-full py-3 bg-gray-600 text-white text-lg rounded-lg hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 text-center">
                Back
            </a>
        </div>
    </form>
</div>

@endsection