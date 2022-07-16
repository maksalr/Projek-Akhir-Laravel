<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Ambil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AmbilController extends Controller
{
    public function index()
    {
        $Quest = DB::table('quests')
            ->join('users', 'quests.user_id', '=', 'users.id')
            ->select('users.name', 'quests.*')
            ->where('quests.status', '=', 'telah diambil')
            ->where('quests.user_ambil', '=', Auth::id())
            ->get();

        return view('home')->with(compact('Quest'));
    }
}