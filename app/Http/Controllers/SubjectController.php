<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
        ]);

        Subject::create($validatedData);
        return redirect('/subjects')->with('success', 'Materia agregada correctamente.');
    }

    public function show($id)
    {
        $subject = Subject::with('activities')->findOrFail($id);
        return view('subjects.show', compact('subject'));
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
        ]);

        Subject::whereId($id)->update($validatedData);
        return redirect('/subjects')->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
        return redirect('/subjects')->with('success', 'Materia eliminada correctamente.');
    }
}