<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Song; 
use Illuminate\Http\Request;
use App\Http\Requests\CreateSong;
use App\Http\Requests\EditSong;

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
    $song->artist = $request->artist;

    $current_folder->songs()->save($song);

    return redirect()->route('music.index', [
        'id' => $current_folder->id,
    ]);
    }
    public function showEditForm(int $id, int $song_id)
    {
    $song = Song::find($song_id);

    return view('music/edit', [
        'song' => $song,
    ]);
    }
    public function edit(int $id, int $song_id, EditSong $request)
    {
        // 1
        $song = Song::find($song_id);
    
        // 2
        $song->title = $request->title;
        $song->status = $request->status;
        $song->artist = $request->artist;
        $song->save();
    
        // 3
        return redirect()->route('music.index', [
            'id' => $song->folder_id,
        ]);
    }
    public function showDeleteForm(int $id, int $song_id)
    {
    $song = Song::find($song_id);

    return view('music/delete', [
        'song' => $song,
    ]);
    }
    public function delete(int $id, int $song_id)
    {
        $song = Song::find($song_id);
        $song -> delete();
        return redirect()->route('music.index', [
            'id' => $song->folder_id,
        ]);
    }
}
