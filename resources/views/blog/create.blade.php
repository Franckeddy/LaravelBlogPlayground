@extends('base')

@section('title', 'Créer un article')

@section('content')
    <div class="bg-white py-8">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl lg:mx-0">
                    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Créer un article</h2>
                </div>
                <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 lg:mx-0 lg:max-w-none">
                    @include('blog.form')
                </div>
        </div>
    </div>
@endsection
