@extends('layouts.admin')

@section('content')
<div class=" pt-64 pl-32 text-center">
    <span class=" text-5xl -ml-32">Edit User</span>
    <form action="{{ route('admin.users.update', $user) }}" method="POST" class=" border w-2/5 ml-80 mt-8 text-left">
      @csrf
      @method('PUT')
      <div class=" ml-20 mt-3">
        <label for="name" class=" text-2xl">Name</label><br>
        <input type="text" id="name" name="name" value="{{ $user->name }}" class=" text-black w-4/5">
      </div>
      <div class=" ml-20 mt-3">
        <label for="email" class=" text-2xl">Email</label><br>
        <input type="email" id="email" name="email" value="{{ $user->email }}" class=" text-black w-4/5">
      </div>
      <button class=" border w-90 mt-4 mb-4 ml-20 hover:bg-white hover:text-black text-2xl" type="submit">Edit</button>
    </form>
</div>    
@endsection