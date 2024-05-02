<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    public function index()
    {
        $activities = Activity::all();

        return view('user.activities.index', compact('activities'));
    }

 
    public function create()
    {
        return view('user.activities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
        ]);

        Activity::create([
            'name' => $request->name,
        ]);

        session()->flash('success_message', 'Your activity was created successfully');

        return redirect()->route('user.activities.index');
    }

    

    public function edit(string $id)
    {
        $activity = Activity::findOrFail($id);

        return view('user.activities.edit', compact('activity'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
        ]);

        $activity = Activity::findOrFail($id);

        $activity->update([
            'name' => $request->name,
        ]);

        session()->flash('success_message', 'Your activity was updated successfully');

        return redirect()->route('user.activities.index');
    }

    public function destroy(string $id)
    {
        $activity = Activity::findOrFail($id);

        if ($activity->todos->count() > 0) {
            abort(403, 'This category has articles and cannot be deleted');
        }


        $activity->delete();

        return redirect()->back();
    }
}
