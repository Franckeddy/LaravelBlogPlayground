@extends('base')

@section('title', 'Accueil du Blog')

@section('content')
    <h1>Mon Blog</h1>

    @foreach($posts as $post)
        <div class="m-2.5 py-1 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h2>
            @if($post->category)
                <p class="font-normal text-gray-700 dark:text-gray-400">Categorie:
                    <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">
                        {{ $post->category?->name }}
                    </span>
                </p>
            @endif
            @if(!$post->tags->isEmpty())
                <p class="font-normal text-gray-700 dark:text-gray-400">Tags:
                @foreach($post->tags as $tag)
                        <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                            {{ $tag->name }}
                        </span>
                @endforeach
            @endif
            <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post->content }}</p>
            <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300">{{ $post->created_at->format('d/m/Y') }}</p>
            <nav aria-label="Page navigation example" class="m-2.5">
                <ul class="inline-flex -space-x-px">
                    <li>
                        <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Lire l'article</a>
                    </li>
                </ul>
            </nav>
        </div>
    @endforeach

    {{ $posts->links() }}

@endsection
