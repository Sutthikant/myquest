<?php

namespace App\Http\Controllers;

use App\Models\Quest;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    
    public function __invoke()
    {
        $quests = Quest::with('user') -> latest('created_at') -> take(6) -> get();
        
        return view('welcome', ['quests' => $quests]);
    }
}
