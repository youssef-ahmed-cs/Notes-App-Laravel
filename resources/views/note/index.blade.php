<x-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Notes</h1>
            <a class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition" href="{{ route('note.create') }}">
                + New Note
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($notes as $note)
                <div class="bg-white rounded-lg shadow p-6 flex flex-col justify-between">
                    <div class="mb-2 text-xl font-semibold text-gray-900">
                        {{ $note->title }}
                    </div>
                    <div class="mb-4 text-gray-700">
                        {{ Str::words($note->note, 30) }}
                    </div>
                    <div class="flex space-x-2">
                        <a class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition" href="{{ route('note.show', $note->id) }}">View</a>
                        <a class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition" href="{{ route('note.edit', $note->id) }}">Edit</a>
                        <form action="{{ route('note.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition" type="submit">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-8">
            {{ $notes->links() }}
        </div>
    </div>
</x-layout>
