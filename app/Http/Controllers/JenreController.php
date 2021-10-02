<?php

namespace App\Http\Controllers;

use App\Models\Jenre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenreController extends Controller
{
    public function getJenres()
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        $jenres = Jenre::all();
        return view('admin.jenres.table',[
            'jenres'=>$jenres
        ]);
    }

    public function goToCreatePage()
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        return view('admin.jenres.create');
    }

    public function create(Request $request)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        Jenre::create([
            'title' => $request['title'],
        ]);
        return redirect()->route('admin.jenres.table');
    }

    public function edit(Jenre $jenre)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        return view('admin.jenres.edit',[ 'jenre'=>$jenre ]);
    }

    public function update(Request $request, Jenre $jenre)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        $jenre->title = $request->title;
        $jenre->save();

        return redirect()->route('admin.jenres.table');
    }

    public function destroy(Jenre $jenre)
    {
        if(auth()->user()->role != "admin"){
            return redirect()->route('home');
        }
        DB::table('game_jenre')->where('jenre_id', $jenre->id)->delete();
        $jenre->delete();
        return redirect()->route('admin.jenres.table');
    }
}
