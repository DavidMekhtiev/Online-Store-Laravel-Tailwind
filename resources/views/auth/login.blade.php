<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Login</title>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class=" w-full h-full absolute top-0 left-0 overflow-auto">
            <div class=" bg-gray-900 absolute top-1/2 left-1/2 w-72 h-48 -ml-36 -mt-28 text-white rounded">
                <!-- Header -->
                <div class="text-center mb-4 mt-4 text-xl">
                    <h1>Sign In</h1>
                </div>
                <!-- END Header -->

                <!-- Sign In Form -->
                <form method="POST" action="{{ route('login') }}" class=" ml-14">
                    @csrf

                    <div class="">
                            <input id="email" type="email" placeholder="EMail"  class="text-black rounded-sm" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="text-red-900" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class=" mt-4">

                            <input id="password" type="password" placeholder="Password" class="text-black rounded-sm"  name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="text-red-900" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>

                    <div class=" mt-4">
                            <button type="submit" class=" rounded-sm border-2 w-24 ml-10 hover:bg-gray-700">
                                {{ __('Login') }}
                            </button>
                    </div>
                </form>
                <!-- END Sign In Form -->
            </div>
        </div>
    </body>
</html>
