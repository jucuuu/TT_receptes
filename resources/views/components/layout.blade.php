<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width
    initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <title>JH recipes</title>
</head>
<body>
    <nav class="sticky top-0 bg-white-100 z-20 flex">
        @can ('post recipes')
            <div>
                <a href="/recipes/create"
                class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">{{ __('msg.post') }}</a>
            </div>
        @endcan
        
        @cannot ('logout')
            <div>
                <a href="/register" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">{{ __('msg.register') }}</a>
            </div>
            <div>
                <a href="/login" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">{{ __('msg.login') }}</a>
            </div>
        @endcan

        @can('authorised')
        <div>
            <a href="{{route('profile.edit')}}" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">{{ __('msg.profile') }}</a>
        </div>
        @endcan

        @can('logout')
            <form method="POST" action="{{ route('logout') }}" id="logout-form" class="inline-block absolute inset-y-0 right-0 border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">
                @csrf
        
                <a href="{{route('logout')}}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('msg.log out') }}
                </a>
            </form>
        @endcan
        
        <div class="float-right">
            <a href="{{route('lang', ['lang' => 'en'])}}" class="inline-block border-2 border-white text-sky-500 py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-200 hover:bg-sky-300">English</a>
            <a href="{{route('lang', ['lang' => 'lv'])}}" class="inline-block border-2 border-white text-sky-500 py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-200 hover:bg-sky-300">Latviešu</a>
        </div>
    </nav>
    
    <main>
        {{$slot}}
    </main>
    <footer>

    </footer>

    <x-flash-message />
</body>
</html>