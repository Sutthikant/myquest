<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index()
    {
        $quests = Quest::where('user_id', 1) -> get();

        return view('quests.index', ['quests' => $quests]);
    }

    public function show(string $id)
    {
        return view('quests.show', ['quest' => Quest::find($id)]);
    }

    public function create()
    {
        return view('quests.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'string'],
            'reward' => 'required',
        ]);

        $title = $request -> title;
        $reward = $request -> reward;

        $quest = Quest::create([
            'title' => $title,
            'reward' => $reward,
            'user_id' => 1, 
        ]);


        return redirect()->route('quests.show', ['quest' => $quest -> id]);
    }

    public function edit(string $id)
    {
        $quest = Quest::find($id);

        return view('quests.edit', ['quest' => $quest]);
    }

    public function update(Request $request, string $id)
    {
        $quest = Quest::find($id);

        $title = $request -> title;
        $reward = $request -> reward;

        $quest->update([
            'title'=>$title,
            'reward'=>$reward,

        ]);

        return redirect()->route('quests.show', ['quest' => $quest -> id]);
    }

    public function destroy(string $id)
    {
        $quest = Quest::find($id);

        $quest->delete();

        return redirect() -> route('quests.index');
    }


}
