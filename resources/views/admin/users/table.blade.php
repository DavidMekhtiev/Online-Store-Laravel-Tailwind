@extends('layouts.admin')

@section('content')
<div class=" pt-8 pl-24 text-center">
    <span class=" text-5xl -ml-32">Users</span><br>
    <table class=" w-11/12 mt-5 ml-5">
      <thead>
          <tr>
            <th class=" border text-2xl ">Name</th>
            <th class=" border text-2xl ">Email</th>
            <th class=" border text-2xl w-16">Edit</th>
            <th class=" border text-2xl w-16">Delete</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($users as $user)
          <tr>
            <td class=" border">
                <span class=" text-3xl">{{ $user->name }}</span>
            </td>
            <td class=" border">
                <span class=" text-3xl">{{ $user->email }}</span>
            </td>
            <td class=" border">
              <a href="{{ route('admin.users.edit', $user) }}">
                <img src="https://img.icons8.com/ios-filled/40/ffffff/edit--v1.png" class=" ml-3"/>
              </a>
            </td>
            <td class=" border">
              <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
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