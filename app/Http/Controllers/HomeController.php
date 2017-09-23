<?php

namespace App\Http\Controllers;

use App\Chirp;
use App\Events\ChirpAction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $chirps = Chirp::with('author')
            ->orderBy('posted_at', 'desc')
            ->get();
        return view('home', ['chirps' => $chirps]);
    }

    public function actOnChirp(Request $request, $id)
    {
        $action = $request->get('action');
        switch ($action) {
            case 'Like':
                Chirp::where('id', $id)->increment('likes_count');
                break;
            case 'Unlike':
                Chirp::where('id', $id)->decrement('likes_count');
                break;
        }
        broadcast(new ChirpAction($id, $action))->toOthers();
        return '';
    }
}
