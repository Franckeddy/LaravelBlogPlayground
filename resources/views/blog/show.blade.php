@extends('base')

@section('title', $post->title)

@section('content')
    <div class="bg-white py-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $post->title }}</h5>
                <p class="font-normal text-gray-700 dark:text-gray-400">
                    Categorie:
                    <span class="inline-flex items-center rounded-md bg-yellow-50 px-2 py-1 text-xs font-medium text-yellow-800 ring-1 ring-inset ring-yellow-600/20">
                        {{ $post->category?->name }}
                    </span>
                </p>
                @if(!$post->tags->isEmpty())
                    <p class="font-normal text-gray-700 dark:text-gray-400">Tags:
                        @foreach($post->tags as $tag)
                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </p>
                @endif
                <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post->content }}</p>
                <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300">{{ $post->created_at->format('d/m/Y') }}</p>
        </div>
    </div>
@endsection
