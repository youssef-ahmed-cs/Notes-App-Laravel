<x-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Note</h1>
        <form action="{{ route('note.update', $note->id) }}" method="POST" class="bg-white rounded-lg shadow p-6 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="note" class="block text-gray-700 font-semibold mb-2">Note</label>
                <textarea id="note" name="note" rows="6" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>{{ old('note', $note->note) }}</textarea>
            </div>
            <div class="flex space-x-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Save Changes
                </button>
                <input type="hidden" name="user_id" value="1">

                <a href="{{ route('note.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                    Back
                </a>
            </div>
        </form>
    </div>
</x-layout>
