<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index(int $id)
    {
        $folders = Folder::all();
    
        return view('music/index', [
            'folders' => $folders,
            'current_folder_id' => $id,
        ]);
    }
}
