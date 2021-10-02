@extends('layouts.admin')

@section('content')
<div class=" pt-8 pl-24 text-center">
    <span class=" text-5xl -ml-32">Jenres</span><br>
    <a href="{{ route('admin.jenres.create.form') }}" class=" border float-right mr-56 mb-5 text-2xl pl-3 pr-3 hover:bg-white hover:text-black">Create</a><br>
    <table class=" w-9/12 mt-5 ml-28">
      <thead>
          <tr>
            <th class=" border text-2xl ">Title</th>
            <th class=" border text-2xl w-16">Edit</th>
            <th class=" border text-2xl w-24">Delete</th>
          </tr>
      </thead>
      <tbody>
        @foreach ($jenres as $jenre)
          <tr>
            <td class=" border">
                <span class=" text-3xl">{{ $jenre->title }}</span>
            </td>
            <td class=" border">
              <a href="{{ route('admin.jenres.edit', $jenre) }}">
                <img src="https://img.icons8.com/ios-filled/40/ffffff/edit--v1.png" class=" ml-3"/>
              </a>
            </td>
            <td class=" border">
              <a href="{{ route('admin.jenres.destroy', $jenre) }}">
                <img src="https://img.icons8.com/ios-filled/40/ffffff/delete-sign--v1.png" class=" ml-7"/>
              </a>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
</div>           
@endsection