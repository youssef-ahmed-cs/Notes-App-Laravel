<x-layout>
    <div class="max-w-4xl mx-auto py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-slate-800">Your Notes <span class="text-amber-500">++</span></h1>
            <a class="bg-amber-500 text-white px-4 py-2 rounded shadow hover:bg-amber-600 transition"
               href="{{ route('note.create') }}">
                + New Note
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($notes as $note)
                <div class="bg-white border border-slate-200 rounded-xl shadow-sm p-6 flex flex-col justify-between transition transform hover:-translate-y-1 hover:shadow-lg">
                    <div class="mb-2 text-xl font-semibold text-slate-800 flex items-center">
                        {{ $note->title }}
                        @if($note->favorite)
                            <svg class="w-5 h-5 text-amber-400 ml-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.966a1 1 0 00.95.69h4.175c.969 0 1.371 1.24.588 1.81l-3.38 2.455a1 1 0 00-.364 1.118l1.287 3.966c.3.921-.755 1.688-1.54 1.118l-3.38-2.455a1 1 0 00-1.175 0l-3.38 2.455c-.784.57-1.838-.197-1.539-1.118l1.287-3.966a1 1 0 00-.364-1.118L2.049 9.393c-.783-.57-.38-1.81.588-1.81h4.175a1 1 0 00.95-.69l1.286-3.966z"/>
                            </svg>
                        @endif
                    </div>

                    <div class="text-xs text-slate-500 mb-2">
                        Created: {{ $note->created_at->setTimezone('Africa/Cairo')->format('Y-m-d H:i') }}
                    </div>

                    <div class="mb-4 text-slate-700 leading-relaxed">
                        {{ Str::words($note->note, 30) }}
                    </div>

                    <div class="flex space-x-2 mt-auto">
                        <a class="bg-sky-500 text-white px-3 py-1 rounded hover:bg-sky-600 transition"
                           href="{{ route('note.show', $note->id) }}">View</a>
                        <a class="bg-yellow-400 text-gray-900 px-3 py-1 rounded hover:bg-yellow-500 transition"
                           href="{{ route('note.edit', $note->id) }}">Edit</a>
                        <form action="{{ route('note.destroy', $note->id) }}" method="POST"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition"
                                    type="submit">
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
