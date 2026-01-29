<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Zoek een oppas adres</h1>

            <form method="GET" class="mb-8 bg-white p-4 rounded-lg shadow sm:flex gap-4 items-end">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700">Diersoort</label>
                    <select name="species" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">Alle dieren</option>
                        <option value="Hond" {{ request('species') == 'Hond' ? 'selected' : '' }}>Hond</option>
                        <option value="Kat" {{ request('species') == 'Kat' ? 'selected' : '' }}>Kat</option>
                        <option value="Labradoodle" {{ request('species') == 'Labradoodle' ? 'selected' : '' }}>Labradoodle</option>
                    </select>
                </div>
                <button type="submit" class="mt-4 sm:mt-0 bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700">Filteren</button>
            </form>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($requests as $req)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-start">
                                <h2 class="text-xl font-bold text-indigo-600">{{ $req->pet->name }}</h2>
                                <span class="bg-indigo-100 text-indigo-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $req->pet->species }}</span>
                            </div>
                            <p class="text-gray-500 text-sm mt-1">Eigenaar: {{ $req->owner->name }}</p>
                            <p class="mt-4 text-gray-700">{{ Str::limit($req->pet->description, 120) }}</p>
                            
                            <div class="mt-4 space-y-2">
                                <p class="text-sm"><strong>Wanneer:</strong> {{ $req->start_date }} tot {{ $req->end_date }}</p>
                                <p class="text-sm"><strong>Tarief:</strong> €{{ $req->price }} p/u</p>
                            </div>
                        </div>

                        <a href="{{ route('requests.show', $req) }}" class="mt-6 block w-full text-center bg-gray-800 text-white py-2 rounded-md hover:bg-gray-900 transition">
                            Bekijk Details
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>