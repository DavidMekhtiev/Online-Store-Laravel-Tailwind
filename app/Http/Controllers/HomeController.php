<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Game;
use App\Models\Jenre;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $games = Game::all();
        $jenres = Jenre::all();
        if(auth()->user()->role == "admin"){
            return view('admin.home',[
                'games'=>$games,
                'jenres'=>$jenres
            ]);
        }else{
            return view('home',[
                'games'=>$games,
                'jenres'=>$jenres
            ]);
        }
    }
}
