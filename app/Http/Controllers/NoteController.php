<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index()
    {
        $notes = Note::all();
        return view('backend.notes.index', compact('notes'));
    }

    public function create(Request $request)
    {
        return view('backend.notes.create');
    }

    public function store(NoteRequest $request)
    {
        try {
            Note::create([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('note.index')->withMessage('Note Added');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        $note = Note::find($id);
        return view('backend.notes.edit', compact('note'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = $request->except('_token');
            Note::where('id', $id)->update($data);
            return redirect()->route('note.index')->withMessage('Updated Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $note = Note::find($id);
            $note->delete();
            return redirect()->route('note.index')->withMessage('Deleted Done');
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

}
