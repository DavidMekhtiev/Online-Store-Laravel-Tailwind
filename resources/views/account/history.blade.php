@extends('layouts.app')

@section('content')
    <div class=" pt-8 pl- pl-24 text-center">
        <span class=" text-5xl -ml-32">History</span>
        <table class=" w-11/12 mt-5">
        <thead>
            <tr>
                <th class=" border text-2xl">Game</th>
                <th class=" border text-2xl">Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($games as $game)
                <tr>
                    <td class=" border">
                        <span class=" text-4xl">{{ $game->title }}</span>
                    </td>
                    <td class=" border">
                        <span class=" text-3xl">{{ $game->price }}$</span>
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection