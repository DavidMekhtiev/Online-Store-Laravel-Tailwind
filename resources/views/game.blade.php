@extends('layouts.app')

@section('content')
<a href="{{ route('account.cart.add', $game[0]->id) }}" class=" text-3xl border p-1 hover:bg-white hover:text-black mr-8 mt-7 float-right">Add to cart</a>
<div class=" pt-8 pl-24">
    <img src="{{ asset('/storage/'. $game[0]->image) }}" alt="" class=" w-96 inline-block float-left">
    <div class=" mt-36 text-center">
        <span class=" text-7xl -ml-32">{{ $game[0]->title }}</span><br>
        <span class=" text-3xl -ml-32">
        @foreach ($game[0]->jenres as $jen)
            {{ $jen->title }},
        @endforeach
        </span><br>
        <b class=" text-4xl -ml-32">{{ $game[0]->price }}$</b>
    </div>
</div>
<div class=" mt-44 mr-8 ml-8">
    <span class=" text-4xl">{{ $game[0]->description }}</span>
</div> 
@endsection