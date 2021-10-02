@extends('layouts.admin')

@section('content')
<div class=" pt-8 pl-24 text-center">
    <span class=" text-5xl -ml-32">Games</span><br>
    <a href="{{ route('admin.games.create.form') }}" class=" border float-right mr-28 mb-3 text-2xl pl-2 pr-2 hover:bg-white hover:text-black">Create</a>
    <table class=" w-11/12 mt-5">
    <thead>
        <tr>
          <th class=" border text-2xl w-36">Image</th>
          <th class=" border text-2xl w-64">Title</th>
          <th class=" border text-2xl w-96">Description</th>
          <th class=" border text-2xl w-36">Price</th>
          <th class=" border text-2xl w-16">Edit</th>
          <th class=" border text-2xl w-16">Delete</th>
        </tr>
    </thead>
    <tbody>
      @foreach ($games as $game)
        <tr>
          <td class=" border">
            <img src="{{ asset('/storage/'. $game->image) }}" alt="Image not found" class=" w-28 ml-6">
          </td>
          <td class=" border">
              <span class=" text-3xl">{{ $game->title }}</span>
          </td>
          <td class=" border">
              <span class=" text-2xl">{{ substr($game->description,0,55) }}...</span>
          </td>
          <td class=" border">
              <span class=" text-3xl">{{ $game->price }}$</span>
          </td>
          <td class=" border">
            <a href="{{ route('admin.games.edit', $game) }}">
              <img src="https://img.icons8.com/ios-filled/40/ffffff/edit--v1.png" class=" ml-4"/>
            </a>
          </td>
          <td class=" border">
            <form action="{{ route('admin.games.destroy', $game) }}" method="POST">
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