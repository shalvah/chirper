<?php

namespace App\Http\Controllers;

use App\Chirp;
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
}
