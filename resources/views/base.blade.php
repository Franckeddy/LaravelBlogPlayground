<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>

@php
    $routeName = request()->route()->getName();
@endphp

<nav class="flex-center bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/" class="flex items-center">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Laravel</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
        </button>
        <div class="contents w-full md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li>
                    <a @class(['nav-link', 'active' => str_starts_with($routeName, 'blog.')]) href="{{ route('blog.index') }}">Blog</a>
                </li>
                <li>
                    <a @class(['nav-link', 'active' => str_starts_with($routeName, 'welcome.')]) href="{{ route('blog.create') }}">New</a>
                </li>
                <li>
                    <a @class(['nav-link', 'active' => str_starts_with($routeName, 'cat.')]) href="{{ route('cat.index') }}">Cat</a>
                </li>
            </ul>
            <div class="flex items-center justify-center mt-4 md:mt-0">
                @auth
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    <form action="{{ route('auth.logout') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit">: Se Déconnecter</button>
                    </form>
                @endauth
                @guest
                        <a href="{{ route('auth.login') }}">Se Connecter</a>
                @endguest
            </div>
        </div>
    </div>
</nav>

@if(session()->has('success'))
<article class="grid max-w-screen-xl flex-wrap items-center justify-between mx-auto p-4">
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
</article>
@endif

@yield('content')

</body>
</html>
