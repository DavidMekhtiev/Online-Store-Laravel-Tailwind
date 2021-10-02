@extends('layouts.app')

@section('content')
<div class=" pt-8 pl-24 text-center">
    <span class=" text-5xl -ml-32">Cart</span><br>
    <a href="{{ route('account.cart.buy') }}" class=" pr-5 pl-5 text-3xl border float-right mr-28 hover:bg-white hover:text-gray-900">Buy</a><br>
    <table class=" w-11/12 mt-5">
        <thead>
            <tr>
                <th class=" border text-2xl w-36">Image</th>
                <th class=" border text-2xl w-64">Title</th>
                <th class=" border text-2xl w-96">Description</th>
                <th class=" border text-2xl w-36">Price</th>
                <th class=" border text-2xl w-16">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach (auth()->user()->games as $game)
                <tr>
                    <td class=" border">
                        <img src="{{ asset('/storage/'. $game->image) }}" alt="" class=" w-28 ml-8">
                    </td>
                    <td class=" border">
                        <span class=" text-3xl">{{ $game->title }}</span>
                    </td>
                    <td class=" border">
                        <span class=" text-2xl">{{ substr($game->description,0,30) }}...</span>
                    </td>
                    <td class=" border">
                        <span class=" text-3xl">{{ $game->price }}$</span>
                    </td>
                    <td class=" border">
                        <form action="{{ route('account.cart.delete', $game->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit">
                                <img src="https://img.icons8.com/ios-filled/40/ffffff/delete-sign--v1.png" class=""/>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>   
@endsection