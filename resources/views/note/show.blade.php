<x-layout>
    <div class="max-w-xl mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Note Details</h1>
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <div class="text-gray-700 text-lg">
                {{ $note->note }}
            </div>
        </div>
        <div class="flex space-x-2">
            <a href="{{ route('note.edit', $note->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">Edit</a>
            <a href="{{ route('note.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back</a>
        </div>
    </div>
</x-layout>
