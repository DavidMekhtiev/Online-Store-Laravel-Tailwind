<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <title>GameStore</title>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        <div class="bg-gray-900 text-white w-9/12 h-14 ml-60 rounded-b-md">
            <a href="{{ route('home') }}" class=" text-5xl ml-5 inline-block">
              GameStore
            </a>
            <form action="{{ route('games.find') }}" class="inline-block ml-56 align-text-bottom" method="POST">
              @csrf
              <input type="text" name="search" class=" w-96 h-9 rounded-l-sm text-black text-2xl" placeholder="Search...">
              <button type="submit" class=" border-2 rounded-r-sm absolute">
                <span>
                  <img src="https://img.icons8.com/ios-filled/32/ffffff/search--v1.png"/>
                </span>
              </button>
            </form>
            <div class="inline-block right-64 mt-1 absolute text-4xl">
              <a href="{{ route('account') }}">
                  <img src="https://img.icons8.com/ios-filled/50/ffffff/guest-male--v2.png" class=" inline-block"/>
                  <span class=" inline-block border-l-2 pl-2 align-middle">
                    @if (auth()->user()->name != null)
                        {{ auth()->user()->name }}
                    @else
                        Account
                    @endif
                  </span>
              </a>
            </div>
          </div>
          
          <div class="bg-gray-900 text-white w-9/12 h-100 ml-60 mt-12 rounded-md">
            @yield('content')    
          </div>   
    </body>
</html>
