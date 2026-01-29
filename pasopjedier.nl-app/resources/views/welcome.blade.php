<x-app-layout>
    <div class="hero-section">
        <h1 class="text-white">De perfecte match tussen mens & dier</h1>
        <a href="/login" class="btn-murrey">Login</a>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 px-4 py-8">
        @foreach($pets as $pet)
            <div class="pet-card">
                <img src="{{ asset('storage/' . $pet->image_path) }}" alt="{{ $pet->name }}" class="w-full h-40 object-cover">
                <div class="p-4">
                    <h3 class="font-bold">{{ $pet->name }}</h3>
                    <p class="text-sm text-gray-500">{{ $pet->user->city }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>