<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width
    initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <title>JH Recipes</title>
</head>
<body>
    <nav class="sticky top-0 bg-white-100 z-20 flex">
        <div>
            <a href="/recipes/create" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">Post</a>
        </div>
        <div>
            <a href="/register" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">Register</a>
        </div>
        <div>
            <a href="/login" class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl mt-2 hover:text-black hover:border-black bg-sky-500 hover:bg-sky-600">Login</a>
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