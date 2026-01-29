<x-app-layout>
    <div class="py-12 px-4 max-w-2xl mx-auto">
        <div class="bg-white p-8 shadow-sm rounded-lg border">
            <h1 class="text-2xl font-bold mb-4">Hoe was de oppasbeurt?</h1>
            <p class="text-gray-600 mb-6">Laat een beoordeling achter voor {{ $acceptedResponse->sitter->name }}</p>

            <form action="{{ route('reviews.store', $oppasRequest) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Rating (1-5 sterren)</label>
                    <input type="number" name="rating" min="1" max="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                </div>

                <div class="mb-6">
                    <label class="block font-medium text-gray-700">Je ervaring</label>
                    <textarea name="comment" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" placeholder="Schrijf hier wat je van de oppas vond..."></textarea>
                </div>

                <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-bold hover:bg-indigo-700 transition">
                    Review Plaatsen
                </button>
            </form>
        </div>
    </div>
</x-app-layout>