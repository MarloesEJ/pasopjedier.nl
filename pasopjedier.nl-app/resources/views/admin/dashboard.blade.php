<x-app-layout>
    <div class="py-12 px-4 max-w-7xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Admin Beheerpaneel</h1>

        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4 text-red-600">Oppasvragen Modereren</h2>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="py-2">Titel/Dier</th>
                        <th class="py-2">Eigenaar</th>
                        <th class="py-2">Actie</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($requests as $req)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-2">{{ $req->pet->name }} ({{ $req->pet->species }})</td>
                            <td class="py-2">{{ $req->owner->name }}</td>
                            <td class="py-2">
                                <form action="{{ route('admin.delete-request', $req) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="text-red-500 hover:underline">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="bg-white shadow rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Gebruikers Beheren</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($users as $user)
                    <div class="flex justify-between items-center p-3 border rounded">
                        <span>{{ $user->name }} ({{ $user->email }})</span>
                        <form action="{{ route('admin.block', $user) }}" method="POST">
                            @csrf
                            <button class="bg-orange-500 text-white px-3 py-1 rounded text-sm hover:bg-orange-600">
                                Blokkeren
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>