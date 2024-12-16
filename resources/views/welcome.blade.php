<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com">
        </script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&amp;display=swap" rel="stylesheet"/>
        <!-- Styles -->
        
    </head>

    <body class="overflow-hidden">
        <div class="flex bg-white shadow-lg" style="height: 730px;">
            <div class="w-2/3 bg-[#AEC9B4] flex flex-col items-center justify-center p-8 pb-20">
                <img src="{{ asset('images/image1.png') }}" style="width:350px">
                <p class="text-center text-lg mb-2">Do you love traveling, taking pictures or just looking at them? </p>
                <p class="text-center text-lg mb-2">Then this is a must have website for you!</p>
                <p class="text-center text-lg">The newest site to upload your City &amp; Nature pictures to!</p>
            </div>

            <body class="antialiased">
           
                @if (Route::has('login'))
                    <div class="w-1/3 flex flex-col items-center justify-center p-10">
                        @auth
                            <a href="{{ url('/discover') }}" class="w-3/4 py-4 px-5 mb-4 border border-gray-400 rounded">Discover</a>
                        @else
                            <a href="{{ route('login') }}" class="w-3/4 text-xl py-4 px-5 mb-4 border border-gray-400 rounded">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="w-3/4 text-xl px-4 py-4 border border-gray-400 rounded">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
                
            </body>
        </div>
    </body>
</html>
