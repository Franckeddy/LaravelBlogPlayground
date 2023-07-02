@extends('base')

@section('title', 'Accueil du Blog')

@section('content')
    <h1>Mon Blog</h1>

    @foreach($posts as $post)
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->content }}</p>

            <nav aria-label="Page navigation example">
                <ul class="inline-flex -space-x-px">
                    <li>
                        <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Lire l'article</a>
                    </li>
                </ul>
            </nav>

    @endforeach

    {{ $posts->links() }}

@endsection
