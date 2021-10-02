@extends('layouts.app')

@section('content')
  <div class="text-center -ml-5">
    <span class=" text-8xl ">{{ auth()->user()->name }}</span><br>
    <span class=" text-4xl text-gray-300">{{ auth()->user()->email }}</span>
  </div>
  <div class=" mt-16 ml-36 w-4/5">
    <a href="{{ route('account.cart') }}" class=" text-3xl">Go to cart</a>
    <div class=" border pl-16">
      @foreach (auth()->user()->games as $game)
        <a href="{{ route('games.id', $game->id) }}" class=" inline-block w-64 ml-12 mt-1 bg-white p-1">
          <img src="{{ asset('/storage/'. $game->image) }}" alt="" class=" w-64">
        </a>
      @endforeach
    </div>
  </div>
  <div class=" mt-7 ml-36 w-4/5">
  <a href="{{ route('account.history') }}" class=" text-3xl">Go to history</a>
    <div class=" border pl-16">
      @foreach ($historyGames as $game)
        <a href="{{ route('games.id', $game->id) }}" class=" inline-block w-64 ml-12 mt-1 bg-white p-1">
          <img src="{{ asset('/storage/'. $game->image) }}" alt="" class=" w-64">
        </a>
      @endforeach
    </div>
  </div>
@endsection