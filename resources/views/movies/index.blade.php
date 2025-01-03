@extends('layouts.index')
@section('content')

<section class="container my-24 mx-auto px-4 sm:px-6 lg:px-8">
    <!-- Add Film Button -->
    <div class="flex justify-end mb-6">
        <a
            class="text-white bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-400 hover:to-blue-600 border-0 focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50 rounded-full text-base font-medium px-6 py-3 transition-all duration-300 ease-in-out transform hover:scale-105"
            href="{{ route('movies.create') }}">
            Add Movie
        </a>    
    </div>

    <!-- Movie Card -->
    <div class="bg-white w-full rounded-lg overflow-hidden mx-auto font-sans mt-4">
        <div class="flex flex-wrap justify-center gap-4">
            @forelse ($movies as $movie)
            <div class="w-full max-w-xs bg-gray-50 rounded-lg shadow-sm">
                <!-- Gambar -->
                <div class="relative aspect-[2/3] overflow-hidden rounded-t-lg">
                    <img src="{{$movie->poster}}" alt="{{ $movie->title }}" class="object-cover w-full h-full" />
    
                    <!-- Tahun dan Genre -->
                    <div class="absolute top-0 left-0 flex justify-between w-full px-3 py-2 bg-opacity-70 bg-black text-white rounded-t-lg">
                        <span class="text-xs font-semibold">{{ $movie->year }}</span>
                        <span class="text-xs font-semibold">{{ $movie->genre->name }}</span>
                    </div>
                </div>
    
                <!-- Deskripsi -->
                <div class="p-4">
                    <h5 class="text-lg font-bold text-gray-900 mb-2">{{ $movie->title }}</h5>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ Str::limit($movie->synopsis, 100) }}</p>
    
                    <!-- Tombol Aksi -->
                    <div class="flex justify-between items-center mt-4 space-x-2">
                        <!-- Tombol View -->
                        <a class="flex items-center justify-center px-4 py-2 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
                           href="{{ route('movies.show', $movie->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                                <path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/>
                            </svg>
                            View
                        </a>
    
                        <!-- Tombol Edit -->
                        <a class="flex items-center justify-center px-4 py-2 text-sm bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition"
                            href="{{ route('movies.edit', $movie->id) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                                <path d="M200-200h57l391-391-57-57-391 391v57Zm-80 80v-170l528-527q12-11 26.5-17t30.5-6q16 0 31 6t26 18l55 56q12 11 17.5 26t5.5 30q0 16-5.5 30.5T817-647L290-120H120Zm640-584-56-56 56 56Zm-141 85-28-29 57 57-29-28Z"/>
                            </svg>
                            Edit
                        </a>
    
                        <!-- Tombol Delete -->
                        <form class="delete-form" method="POST" action="{{ route('movies.destroy', $movie->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="delete-button flex items-center justify-center px-4 py-2 text-sm bg-red-600 text-white rounded-lg hover:bg-red-700 transition"
                                    data-movie-title="{{ $movie->title }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="24px" fill="#ffffff">
                                    <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                </svg>
                                Delete
                            </button>
                        </form>
                        
                    </div>
                </div>
            </div>
            @empty
            <div class="w-full text-center py-10">
                <h1 class="text-2xl font-bold text-gray-800">No movies found</h1>
                <p class="mt-2 text-gray-600">We couldn't find any movies that matched your search.</p>
            </div>
            @endforelse
        </div>
    </div>
    
    
</section>

@endsection
