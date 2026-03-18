<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Subject;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    public function create(Request $request)
    {
        $subject_id = $request->query('subject_id');
        $subject = Subject::findOrFail($subject_id);
        
        return view('activities.create', compact('subject'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'type' => 'required|string|max:100',
            'grade' => 'nullable|numeric|min:0|max:100',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        Activity::create($validatedData);
        
        return redirect()->route('subjects.show', $request->subject_id)
                         ->with('success', 'Actividad agregada correctamente.');
    }

    public function edit($id)
    {
        $activity = Activity::findOrFail($id);
        return view('activities.edit', compact('activity'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'type' => 'required|string|max:100',
            'grade' => 'nullable|numeric|min:0|max:100',
            'date' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $activity = Activity::findOrFail($id);
        $activity->update($validatedData);

        return redirect()->route('subjects.show', $activity->subject_id)
                         ->with('success', 'Actividad actualizada correctamente.');
    }
    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $subject_id = $activity->subject_id; 
        $activity->delete();

        return redirect()->route('subjects.show', $subject_id)
                         ->with('success', 'Actividad eliminada correctamente.');
    }
}