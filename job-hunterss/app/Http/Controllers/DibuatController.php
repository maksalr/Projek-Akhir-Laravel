<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DibuatController extends Controller
{
    public function index()
    {
        $Quest = DB::table('quests')
            ->join('users', 'quests.user_id', '=', 'users.id')
            ->select('users.name', 'quests.*')
            ->where('quests.user_id', '=', Auth::id())
            ->get();
        return view('home')->with(compact('Quest'));
    }
}