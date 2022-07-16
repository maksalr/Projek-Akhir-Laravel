<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Quest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class QuestController extends Controller
{
    public function update($id)
    {
        $quest = Quest::find($id);
        $quest->status = "telah diambil";
        $quest->user_ambil = Auth::id();
        $quest->save();
        return back();
    }
    public function index()
    {
        $Quest = DB::table('quests')
            ->join('users', 'quests.user_id', '=', 'users.id')
            ->select('users.name', 'quests.*')
            ->where('status', '=', 'belum diambil')
            ->get();
        return view('home')->with(compact('Quest'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'status' => 'required'
        ]);

        Quest::create([
            'judul' => $request->judul,
            'isi' => $request->deskripsi,
            'status' => $request->status,
            'user_id' => Auth::id()
        ]);

        $pesan = "Berhasil";

        return back()->with(compact('pesan'));
    }
}