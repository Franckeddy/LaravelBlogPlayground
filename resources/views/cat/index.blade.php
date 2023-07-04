@extends('base')

@section('title', 'Catégories du Blog')

@section('content')
    <h1>Mes Catégories</h1>
    @foreach($categories as $category)
        <div class="m-2.5 py-1 block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $category->name }}</h2>
        </div>
    @endforeach
@endsection
