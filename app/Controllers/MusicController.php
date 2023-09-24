<?php

namespace App\Controllers;

use App\Models\MusicModel;
use App\Models\PlaylistModel;
//use App\Models\MusicPlaylistModel;

use App\Controllers\BaseController;

class MusicController extends BaseController
{
    protected $music;
    protected $playlistModel;
  //  protected $musicplaylist;


    public function __construct()
    {
        $this->music = new MusicModel();
        $this->playlistModel = new PlaylistModel();
    //    $this->musicplaylist = new MusicPlaylistModel();

    }

    public function index()
    {
        $data['music'] = $this->music->findAll();
        $data['playlists'] = $this->playlistModel->findAll();
        return view('player', $data);
    }

    public function playlists()
    {
        $data['music'] = $this->music->findAll();
        $data['playlists'] = $this->playlistModel->findAll();
        
        return view('player', $data);
    }

    public function upload()
    {
        $title = $this->request->getPost('title');
        $artist = $this->request->getPost('artist');
        $file_path = $this->request->getFile('file_path');
        $newName = $title . '_' . $artist . '.' . 'mp3';
        $file_path->move(ROOTPATH . 'public/', $newName);
            $data = [
                'title' => $title,
                'artist' => $artist,
                'file_path' => $newName
            ];
            $this->music->insert($data);
            return redirect()->to('/player');
        
    }
}    
