<?php

namespace App\Livewire;

use Illuminate\Contracts\Foundation\Application as ApplicationContract;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class Playlist extends Component
{
    public $musics = [
        [
            'name' => 'Musica 1',
            'artist' => 'Artista 1',
            'album' => 'Album 1',
            'duration' => '3:00',
            'image' => 'https://picsum.photos/200/300',
            'genre' => 'Rock',
        ],
        [
            'name' => 'Musica 2',
            'artist' => 'Artista 2',
            'album' => 'Album 1',
            'duration' => '3:00',
            'image' => 'https://picsum.photos/200/300',
            'genre' => 'Rock',
        ],
    ];
    public function render(): View|Application|Factory|ApplicationContract
    {
        return view('livewire.playlist');
    }
}
