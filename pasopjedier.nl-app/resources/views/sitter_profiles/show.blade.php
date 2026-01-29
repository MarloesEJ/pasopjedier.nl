<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold">{{ $sitter->user->name }}</h1>
        <p class="text-gray-600 mt-2">{{ $sitter->description }}</p>
        <div class="mt-8">
            <h2 class="text-xl font-semibold mb-4">Mijn Huis & Omgeving</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($sitterProfile->media as $media)
                    <div class="relative h-48 bg-gray-200 rounded-lg overflow-hidden shadow-sm">
                        @if(in_array(strtolower($media->file_type), ['mp4', 'mov']))
                            <video class="w-full h-full object-cover">
                                <source src="{{ asset('storage/' . $media->file_path) }}">
                            </video>
                            <div class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-20">
                                <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"/></svg>
                            </div>
                        @else
                            <img src="{{ asset('storage/' . $media->file_path) }}" 
                                alt="Foto van oppashuis" 
                                class="w-full h-full object-cover hover:scale-105 transition duration-300">
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>