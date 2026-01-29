<x-app-layout>
    <div class="form-container">
        <div class="form-card">
            <h2 class="text-2xl font-bold mb-6 text-gray-800">Nieuw Huisdier Toevoegen</h2>
            
            <form action="{{ route('pets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div class="input-group">
                    <label>Naam van je dier</label>
                    <input type="text" name="name" placeholder="Bijv. Beer of Fluffy" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="input-group">
                        <label>Soort</label>
                        <select name="species">
                            <option value="Hond">Hond</option>
                            <option value="Kat">Kat</option>
                            <option value="Vogel">Vogel</option>
                            <option value="Knaagdier">Knaagdier</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <label>Leeftijd</label>
                        <input type="number" name="age" placeholder="Jaar">
                    </div>
                </div>

                <div class="input-group">
                    <label>Beschrijving & Belangrijke info</label>
                    <textarea name="description" rows="4" placeholder="Vertel iets over het karakter..."></textarea>
                </div>

                <div class="input-group">
                    <label>Foto uploaden</label>
                    <input type="file" name="image" class="file-input">
                </div>

                <button type="submit" class="btn-pink w-full">Huisdier Opslaan</button>
            </form>
        </div>
    </div>
</x-app-layout>