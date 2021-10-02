<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Jenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    public function allGames()
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        $games = Game::all();
        return view('admin.games.table',[
            'games' => $games
        ]);
    }

    public function gamesByGenre(Request $request)
    {
        $gj = DB::table('game_jenre')->whereIn('jenre_id', $request->jenresId)->get();
        $games_id = [];
        foreach ($gj as $game) {
            $games_id[] = $game->game_id;
        }
        $games = DB::table('games')->whereIn('id',$games_id)->paginate(12);
        $jenres = Jenre::all();
        return view('home',[
            'games' => $games,
            'jenres' => $jenres
        ]);
    }

    public function goToCreatePage()
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        $jenres = Jenre::all();
        return view('admin.games.create', [
            'jenres' => $jenres
        ]);
    }

    public function gameById($id)
    {
        $game = Game::where('id', $id)->get();
        return view('game', ['game' => $game]);
    }

    public function find(Request $request)
    {
        $jenres = Jenre::all();
        $games = Game::where("title", "like", "%" . $request->search . "%")->get();
        return view('home',[
            'games'=>$games,
            'jenres' => $jenres
        ]);
    }

    public function create(Request $request)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        $path = $request->file('image')->store('uploads', 'public');
        Game::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'price' => $request['price'],
            'image' => $path
        ]);
        $game = Game::where("title", "like", "%" . $request->title . "%")->get();
        foreach ($request->jenres as $jen) {
            DB::insert('INSERT INTO game_jenre (game_id , jenre_id) values (? , ?)',[$game[0]->id,$jen]);
        }
        return redirect()->route('admin.games.table');
    }

    public function edit(Game $game)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        $jenres = Jenre::all();
        return view('admin.games.edit',[
            'game' => $game,
            'jenres' => $jenres
        ]);
    }

    public function update(Request $request, Game $game)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        $game->image = $request->file('image')->store('uploads', 'public');
        $game->title = $request->title;
        $game->description = $request->description;
        $game->price = $request->price;
        $game->save();

        $game = Game::where("title", "like", "%" . $request->title . "%")->get();
        DB::table('game_jenre')->where('game_id',$game[0]->id)->delete();
        foreach ($request->jenres as $jen) {
            DB::insert('INSERT INTO game_jenre (game_id , jenre_id) values (? , ?)',[$game[0]->id,$jen]);
        }
        return redirect()->route('admin.games.table');
    }

    public function destroy(Game $game)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        DB::table('game_jenre')->where('game_id',$game->id)->delete();
        DB::table('game_user')->where('game_id',$game->id)->delete();
        $game->delete();
        return redirect()->route('admin.games.table');
    }
}
