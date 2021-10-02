@extends('layouts.admin')

@section('content')
<div class=" pt-8 pl-32 text-center">
    <span class=" text-5xl -ml-32">New Game</span>
    <form action="{{ route('admin.games.create') }}" method="POST" class=" border w-2/5 ml-80 mt-8 text-left" enctype="multipart/form-data">
      @csrf
      @method('POST')
      <div class=" ml-20 mt-3">
        <label for="title" class=" text-2xl">Title</label><br>
        <input type="text" id="title" name="title" class=" text-black w-4/5">
      </div>
      <div class=" ml-20 mt-3">
        <label for="description" class=" text-2xl">Description</label><br>
        <textarea name="description" id="description" cols="30" rows="10" class=" text-black w-4/5"></textarea>
      </div>
      <div class=" ml-20 mt-3">
        <label for="price" class=" text-2xl">Price</label><br>
        <input type="number" id="price" name="price" class=" text-black w-4/5">
      </div>
      <div class=" ml-20 mt-3">
        <label for="image" class=" text-2xl">Image</label><br>
        <input type="file" id="image" name="image" class=" w-4/5" accept="image/png, image/jpeg">
      </div>
      <div class=" ml-20 mt-3">
        <label for="jenres" class=" text-2xl">Jenres</label><br>
        <select name="jenres[]" id="jenres" class=" w-4/5 text-black" size="5" multiple>
          @foreach ($jenres as $jenre)
              <option value="{{ $jenre->id }}">{{ $jenre->title }}</option>
          @endforeach
        </select>
      </div>
      <button class=" border w-90 mt-4 mb-4 ml-20 hover:bg-white hover:text-black text-2xl" type="submit">Create</button>
    </form>
</div>    
@endsection