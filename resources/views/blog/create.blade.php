@extends('base')

@section('title', 'Créer un article')

@section('content')
    <div class="w-full max-w-xs">
        @include('blog.form')
    </div>
@endsection
