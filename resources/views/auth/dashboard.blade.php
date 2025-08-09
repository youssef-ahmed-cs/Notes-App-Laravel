<x-layout>
    <div class="max-w-3xl mx-auto py-10 px-4 sm:px-6 lg:px-8 space-y-8">

        <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-3">
            <svg class="w-9 h-9 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Dashboard
        </h1>

        <div class="bg-white rounded-xl shadow-md p-6 flex items-center gap-5 border border-gray-100">
            <img
                src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=0D8ABC&color=fff"
                alt="Avatar"
                class="w-16 h-16 rounded-full border border-gray-200 shadow-sm"
            >
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between w-full">
                <p class="text-lg text-gray-700 mb-3 sm:mb-0">
                    Welcome, <span class="font-semibold">{{ auth()->user()->name }}</span>!
                </p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="cor bg-red-500 text-white px-5 py-2 rounded-lg hover:bg-red-600 transition-colors duration-200 font-medium shadow-sm flex items-center gap-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5" />
                        </svg>
                        Logout
                    </button>

                </form>
            </div>
        </div>

        <div class="bg-blue-50 rounded-xl shadow-md p-6 border border-blue-100">
            <h2 class="text-xl font-semibold text-blue-700 mb-3 flex items-center gap-2">
                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-6a2 2 0 012-2h2a2 2 0 012 2v6m-6 0h6"/>
                </svg>
                Get Started with Notes++
            </h2>
            <p class="text-gray-600 mb-4 leading-relaxed">
                Create, edit, and manage your notes easily. Click below to view your notes and start organizing your ideas!
            </p>
            <a
                href="{{ route('note.index') }}"
                class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-200 font-semibold inline-block shadow-sm"
            >
                Go to My Notes
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">Your Notes Summary</h3>
            <p class="text-gray-600">
                You have <span class="font-bold">{{ $notesCount ?? 0 }}</span> notes.
            </p>
        </div>

    </div>
</x-layout>
