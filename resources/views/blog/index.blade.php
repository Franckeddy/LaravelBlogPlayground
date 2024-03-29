@extends('base')

@section('title', 'Accueil du Blog')

@section('content')
    <div class="bg-white py-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Mon Blog</h2>
            </div>
            <div
                class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($posts as $post)
                    <article class="flex max-w-xl flex-col items-start justify-between rounded-lg p-4 bg-slate-100">
                        @if($post->image)
                            <div class="relative mt-8 flex items-center gap-x-4">
                                <img src="{{ $post->imageUrl() }}" alt="" class="object-cover h-150 w-150 rounded-full bg-gray-50">
                            </div>
                        @endif
                        @if($post->category)
                            <div class="flex items-center gap-x-4 text-xs">
                                <time datetime="{{ $post->created_at->format('d/m/Y') }}"
                                      class="text-gray-500">{{ $post->created_at->format('d/m/Y') }}</time>
                                <a href="#"
                                   class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                    {{ $post->category?->name }}
                                </a>
                            </div>
                        @endif
                        <div class="flex">
                            @if(!$post->tags->isEmpty())
                                @foreach($post->tags as $tag)
                                    <div class="flex items-center gap-x-4 text-xs">
                                        <a href="#"
                                           class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                            {{ $tag->name }}
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                <a href="{{ route('blog.show', ['slug' => $post->slug, 'post' => $post->id]) }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->content }}</p>
                        </div>
                    </article>
                @endforeach
            </div>
            {{ $posts->links() }}
        </div>
    </div>

    {{ $posts->links() }}

@endsection
