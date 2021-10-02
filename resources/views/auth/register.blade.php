<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Register</title>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class=" w-full h-full absolute top-0 left-0 overflow-auto">
            <div class=" bg-gray-900 absolute top-1/2 left-1/2 w-72 h-80 -ml-36 -mt-40 text-white rounded">
                <!-- Header -->
                <div class="text-center mb-2 mt-4 text-xl">
                    <h1>Register</h1>
                </div>
                <!-- END Header -->

                <form method="POST" action="{{ route('register') }}" class="ml-14">
                    @csrf

                    <div class="">
                        <label for="name" class="">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="text-black rounded-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="text-red-900" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-1">
                        <label for="email" class="">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="text-black rounded-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="text-red-900" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-1">
                        <label for="password" class="">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="text-black rounded-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class=" text-red-900" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-1">
                        <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="text-black rounded-sm" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class=" mt-4">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="rounded-sm border-2 w-24 ml-10 hover:bg-gray-700">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </body>
</html>
    
