<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note; // Assuming Note is the model for notes

class NoteController extends Controller
{

    public function index()
    {
        $notes = Note::query()->orderBy('favorite' , 'desc')->paginate();
        return view('note.index' , ['notes' => $notes]);
    }


    public function create()
    {
        return view('note.create');
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'note' => 'required|string|max:2000',
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'favorite' => 'boolean|nullable',
        ]);
        $note = Note::create($data);
        return to_route('note.index', ['note' => $note]);
    }


    public function show(Note $note)
    {
        return view('note.show',['note'=> $note]);
    }


    public function edit(Note $note)
    {
        return view('note.edit',['note'=> $note]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'note' => 'required|string|max:2000',
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'required|string|max:255',
            'favorite' => 'boolean|nullable',
        ]);
        $note = Note::findOrFail($id);
        $note->update($data);
        return to_route('note.show', ['note' => $note]);
    }

    public function destroy($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return to_route('note.index')->with('success', 'Note deleted successfully');
    }
}
