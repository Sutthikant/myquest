<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index()
    {
        //
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
        $title = $request -> title;
        $reward = $request -> reward;

        $quest = Quest::create([
            'title' => $title,
            'reward' => $reward,
            'user_id' => 1, 
        ]);

        return $quest;
    }


}
