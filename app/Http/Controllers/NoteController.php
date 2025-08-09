<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::where('user_id', auth()->id())
            ->orderBy('favorite', 'desc')
            ->paginate();

        return view('note.index', [
            'notes' => $notes,
            'user' => auth()->user()
        ]);
    }

    public function create()
    {
        return view('note.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => 'required|string|max:2000',
            'title' => 'required|string|max:255',
            'favorite' => 'boolean|nullable',
        ]);

        $data['user_id'] = auth()->id();

        $note = Note::create($data);

        return to_route('note.index')->with('success', 'Note created successfully');
    }

    public function show(Note $note)
    {
        $this->authorizeAccess($note);

        return view('note.show', ['note'=> $note]);
    }

    public function edit(Note $note)
    {
        $this->authorizeAccess($note);

        return view('note.edit', ['note'=> $note]);
    }

    public function update(Request $request, Note $note)
    {
        $this->authorizeAccess($note);

        $data = $request->validate([
            'note' => 'sometimes|required|string|max:2000',
            'title' => 'sometimes|required|string|max:255',
            'favorite' => 'sometimes|boolean|nullable',
        ]);

        $note->update($data);

        return to_route('note.show', ['note' => $note])
            ->with('success', 'Note updated successfully');
    }

    public function destroy(Note $note)
    {
        $this->authorizeAccess($note);

        $note->delete();

        return to_route('note.index')->with('success', 'Note deleted successfully');
    }

    private function authorizeAccess(Note $note)
    {
        if ($note->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
