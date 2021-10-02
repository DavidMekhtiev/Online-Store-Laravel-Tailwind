@extends('layouts.admin')

@section('content')
<div class=" pt-72 pl-32 text-center">
    <span class=" text-5xl -ml-32">Edit Jenre</span>
    <form action="{{ route('admin.jenres.update', $jenre) }}" method="POST" class=" border w-2/5 ml-80 mt-8 text-left">
        @csrf
        @method('PUT')
        <div class=" ml-20 mt-3">
        <label for="title" class=" text-2xl">Title</label><br>
        <input type="text" id="title" name="title" class=" text-black w-4/5" value="{{ $jenre->title }}">
        </div>
        <button class=" border w-90 mt-4 mb-4 ml-20 hover:bg-white hover:text-black text-2xl" type="submit">Edit</button>
    </form>
</div>    
@endsection