<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cart;
use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getUsers()
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        $users = User::all();
        return view('admin.users.table',[
            'users'=>$users
        ]);
    }

    public function getAccount()
    {
        $historyRows = array_column((DB::table('history')->where('user_id', auth()->user()->id)->get())->toArray(), 'game_id');
        $games = DB::table('games')->whereIn('id', $historyRows)->get();
        return view('account.account',[
           'historyGames'=>$games 
        ]);
    }

    public function getHistory()
    {
        $historyRows = array_column((DB::table('history')->where('user_id', auth()->user()->id)->get())->toArray(), 'game_id');
        $games = DB::table('games')->whereIn('id', $historyRows)->get();
        return view('account.history',[
           'games'=>$games 
        ]);
    }

    public function getCart()
    {
        return view('account.cart');
    }

    public function addToCart($id)
    {
        Cart::create([
            'game_id' => $id,
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back();
    }

    public function deleteFromCart($id)
    {
        DB::table('game_user')->where('game_id', $id)->where('user_id', auth()->user()->id)->delete();
        return redirect()->route('account.cart');
    }

    public function buyGames()
    {
        foreach (auth()->user()->games as $game) {
            DB::table('history')->insert([
                'game_id'=>$game->id,
                'user_id'=>auth()->user()->id
            ]);
        }
        DB::table('game_user')->where('user_id', auth()->user()->id)->delete();

        return redirect()->route('home');
    }

    public function edit(User $user)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        return view('admin.users.edit',['user'=>$user]);
    }

    public function update(Request $request, User $user)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin.users.table');
    }

    public function destroy(User $user)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        DB::table('game_user')->where('user_id',$user->id)->delete();
        $user->delete();
        return redirect()->route('admin.users.table');
    }
}
