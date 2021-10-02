@extends('layouts.admin')

@section('content')
    <form action="{{ route('games.jenres') }}" method="POST" class=" float-left h-full w-56 rounded-l-md">
        @csrf
        @method('POST')
        <select name="jenresId[]" id="jenresId" size="20" required class=" w-full h-99 text-3xl border-gray-900 bg-gray-900 text-white"  multiple>
            @foreach ($jenres as $jen)
                <option value="{{ $jen->id }}">{{ $jen->title }}</option>
            @endforeach
        </select>
        <button class=" border hover:bg-white hover:text-black text-2xl w-56 rounded-bl-md" type="submit">Find</button>
    </form>
    <div class=" float-left grid grid-cols-4 gap-5px grid-flow-row h-full w-10/12 ml-1 pl-2">
        @foreach ($games as $game)
            <a href="{{ route('games.id', $game->id) }}" class=" border h-72">
                <img src="{{ asset('/storage/'. $game->image) }}" alt="{{ $game->title }}" class=" w-72">
            </a> 
        @endforeach 
    </div>
@endsection
