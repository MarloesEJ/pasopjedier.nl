@if(Auth::user()->is_sitter && Auth::id() !== $oppasRequest->owner_id)
    <div class="mt-8 bg-gray-50 p-6 rounded-lg border">
        <h3 class="text-lg font-bold mb-4">Reageren als oppas</h3>
        <form action="{{ route('responses.store', $oppasRequest) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium">Je bericht</label>
                <textarea name="message" class="w-full rounded-md border-gray-300" placeholder="Stel jezelf even voor..."></textarea>
            </div>
            <div class="mb-4">
                <label class="block text-sm font-medium">Uurtarief (€)</label>
                <input type="number" name="proposed_rate" step="0.01" class="rounded-md border-gray-300" value="{{ $oppasRequest->price }}">
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded shadow hover:bg-green-700">Verstuur reactie</button>
        </form>
    </div>
@endif

@if(Auth::id() === $oppasRequest->owner_id)
    <div class="mt-8">
        <h3 class="text-xl font-bold mb-4">Reacties op jouw aanvraag</h3>
        @foreach($oppasRequest->responses as $response)
            <div class="bg-white p-4 border rounded-lg mb-4 flex justify-between items-center shadow-sm">
                <div>
                    <p class="font-bold">{{ $response->sitter->name }}</p>
                    <p class="text-gray-600 text-sm">{{ $response->message }}</p>
                    <p class="text-indigo-600 font-semibold">Vraagt: €{{ $response->proposed_rate }}/u</p>
                </div>
                @if($response->status === 'pending')
                    <div class="flex gap-2">
                        <form action="{{ route('responses.accept', $response) }}" method="POST">
                            @csrf @method('PATCH')
                            <button class="bg-blue-500 text-white px-3 py-1 rounded text-sm">Accepteren</button>
                        </form>
                    </div>
                @else
                    <span class="text-sm font-bold uppercase">{{ $response->status }}</span>
                @endif
            </div>
        @endforeach
    </div>
@endif