@extends('base')

@section('title', $category->name)

@section('content')
    <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $category->name }}</h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">
            Articles:
            <strong>
                {{ $post->category?->name }}
            </strong>
        </p>
        @if(!$post->tags->isEmpty())
            <p class="font-normal text-gray-700 dark:text-gray-400">Tags:
                @foreach($post->tags as $tag)
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300">
                        {{ $tag->name }}
                    </span>
            @endforeach
        @endif
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $post->content }}</p>
        <p class="mt-2 text-sm font-medium text-gray-600 dark:text-gray-300">{{ $post->created_at->format('d/m/Y') }}</p>
    </div>
@endsection
