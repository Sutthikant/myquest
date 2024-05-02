<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Quest;
use App\Models\Todo;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index()
    {
        $quests = Quest::where('user_id', auth()->user()->id) -> get();

        return view('user.quests.index', ['quests' => $quests]);
    }

    public function show(string $id)
    {
        $quest = Quest::find($id);

        if (! $quest->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        return view('user.quests.show', ['quest' => Quest::find($id)]);
    }

    public function create()
    {
        return view('user.quests.create');
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
            'user_id' => auth() -> user() -> id, 
        ]);

        foreach($request -> activities as $activity){
            $todo = Todo::create([
                'quest_id' => $quest -> id,
                'activity_id' => $activity,
                'date' => date('Y-m-d H:i:s'),
                'done' => false,
            ]);
        };

        session() -> flash ('success_message', 'Your quest was created successfully!!!');

        return redirect()->route('user.quests.show', ['quest' => $quest -> id]);
    }

    public function edit(string $id)
    {
        $quest = Quest::find($id);

        if (! $quest->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        return view('user.quests.edit', ['quest' => $quest]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'reward' => 'required',
        ]);

        $quest = Quest::find($id);

        if (! $quest->isAllowedToEdit(auth()->user())) {
            abort(401);
        }

        $title = $request -> title;
        $reward = $request -> reward;

        $quest->update([
            'title'=>$title,
            'reward'=>$reward,

        ]);

        Todo::where('quest_id', $quest->id )->delete();


        foreach($request -> activities as $activity){
            $todo = Todo::create([
                'quest_id' => $quest -> id,
                'activity_id' => $activity,
                'date' => date('Y-m-d H:i:s'),
                'done' => false,
            ]);
        };

        session() -> flash ('success_message', 'Your quest was updated successfully!!!');

        return redirect()->route('user.quests.show', ['quest' => $quest -> id]);
    }

    public function destroy(string $id)
    {
        $quest = Quest::find($id);

        $quest->delete();

        return redirect() -> route('user.quests.index');
    }




}
