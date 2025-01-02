@extends('layouts.index')

@section('content')
<div class="max-w-3xl mx-auto mt-8 p-6 bg-white rounded-lg">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add New Movie</h2>

    <!-- Form input film -->
    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
    
        <!-- Input Title -->
        <div class="mb-4">
            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
            <input type="text" id="title" name="title" 
                   class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" 
                   placeholder="Enter movie title" required>
        </div>
    
        <!-- Input Synopsis -->
        <div class="mb-4">
            <label for="synopsis" class="block mb-2 text-sm font-medium text-gray-900">Synopsis</label>
            <textarea id="synopsis" name="synopsis" rows="4" 
                      class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" 
                      placeholder="Enter movie synopsis" required></textarea>
        </div>
    
        <!-- Input Poster -->
        <div class="mb-4">
            <label for="poster" class="block mb-2 text-sm font-medium text-gray-900">Poster</label>
            <input id="poster" name="poster" type="file" 
                   class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none focus:ring-blue-500 focus:border-blue-500" 
                   required>
        </div>
    
        <!-- Input Year -->
        <div class="mb-4">
            <label for="year" class="block mb-2 text-sm font-medium text-gray-900">Year</label>
            <input type="number" id="year" name="year" 
                   class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-sm focus:ring-blue-500 focus:border-blue-500" 
                   placeholder="Enter release year" 
                   max="{{ date('Y') }}"
                   required>
        </div>
    
        <!-- Input Available -->
        <div class="mb-4">
            <label for="available" class="flex items-center cursor-pointer">
                <input id="available" name="available" type="checkbox" value="1" 
                       class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300" />
                <span class="ml-2 text-sm font-medium text-gray-900">Available</span>
            </label>
        </div>
    
        <!-- Input Genre -->
        <div class="mb-4">
            <label for="genre_id" class="block mb-2 text-sm font-medium text-gray-900">Genre</label>
            <select id="genre_id" name="genre_id" 
                    class="block w-full p-2.5 text-sm text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <!-- Assuming genres are being passed to the view -->
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
    
        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" 
                    class="w-full py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300">
                Add Movie
            </button>
        </div>
    </form>
    
</div>

@endsection
