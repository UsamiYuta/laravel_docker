<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Song; 
use Illuminate\Http\Request;
use App\Http\Requests\CreateSong;

class MusicController extends Controller
{
    public function index(int $id)
    {
    // すべてのフォルダを取得する
    $folders = Folder::all();

    // 選ばれたフォルダを取得する
    $current_folder = Folder::find($id);

    // 選ばれたフォルダに紐づくタスクを取得する
    $songs = $current_folder->songs()->get();

    return view('music/index', [
        'folders' => $folders,
        'current_folder_id' => $current_folder->id,
        'songs' => $songs,
    ]);
    }
    public function showCreateForm(int $id)
    {
        return view('music/create', [
            'folder_id' => $id
        ]);
    }
    public function create(int $id, CreateSong $request)
    {
    $current_folder = Folder::find($id);

    $song = new Song();
    $song->title = $request->title;
    $song->due_date = $request->due_date;

    $current_folder->songs()->save($song);

    return redirect()->route('music.index', [
        'id' => $current_folder->id,
    ]);
    }
}
