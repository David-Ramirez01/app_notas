<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotes;
use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {
        $notes = Notes::where('user_id', auth()->user()->id)->paginate();
        return view('notes.index', compact('notes'));
    }


    public function create()
    {
        return view('notes.create');
    }


    public function show(Notes $notes)
    {
        return view('notes.show', compact('notes'));
    }

    public function edit(Notes $notes)
    {
        return view('notes.edit', compact('notes'));
    }

    public function store(StoreNotes $request)
    {
        Notes::create($request->all());
        return redirect()->route('notes.index');
    }

    public function update(StoreNotes $request, Notes $notes)
    {
        $notes->update($request->all());
        return redirect()->route('notes.show', $notes);
    }

    public function completed (Request $request, Notes $notes)
    {
        if ($request->completed) {
            $request->completed = 1;
            $notes->where('id', $request->id)
                    ->update(["completed" => $request->completed]);
        }

        return redirect()->route('notes.index');
    }

    public function destroy (Notes $notes)
    {
        $notes->delete();
        return redirect()->route('notes.index');
    }



    public function notesCompleted ()
    {
        $notes = Notes::where('user_id', auth()->user()->id)
                        ->where('completed', 1)->paginate();
        return view('notes.vcompleted', compact('notes'));
    }
}
