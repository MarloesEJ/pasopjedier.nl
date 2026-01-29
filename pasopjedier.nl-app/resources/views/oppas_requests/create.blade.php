<x-app-layout>
    <div class="form-container">
        <div class="form-card">
            <h2 class="text-2xl font-bold mb-4">Oppasvraag Plaatsen</h2>
            <form action="{{ route('requests.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="input-group">
                    <label>Selecteer Huisdier</label>
                    <select name="pet_id">
                        @foreach(auth()->user()->pets as $pet)
                            <option value="{{ $pet->id }}">{{ $pet->name }}</button>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="input-group">
                        <label>Startdatum</label>
                        <input type="date" name="start_date">
                    </div>
                    <div class="input-group">
                        <label>Einddatum</label>
                        <input type="date" name="end_date">
                    </div>
                </div>

                <div class="input-group">
                    <label>Uurtarief (€)</label>
                    <input type="number" name="price" step="0.50" placeholder="15.00">
                </div>

                <button type="submit" class="btn-pink w-full">Plaats Advertentie</button>
            </form>
        </div>
    </div>
</x-app-layout>