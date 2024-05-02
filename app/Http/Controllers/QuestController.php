<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function index()
    {
        $quests = Quest::get();

        return view('public.quests.index', ['quests' => $quests]);
    }

    public function show($id)
    {
        $quest = Quest::findOrFail($id);

        return view('public.quests.show', ['quest' => $quest]);
    }

}
