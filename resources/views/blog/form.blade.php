<form method="post" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    @method($post->id ? 'PATCH' : 'POST')
    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Titre de l'article</label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('title')
            <div class="alert alert-danger underline decoration-pink-500/30 text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug-de-l'article</label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('slug')
            <div class="alert alert-danger underline decoration-pink-500/30 text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Text</label>
        <textarea name="content" id="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('textarea', $post->content) }}</textarea>
        @error('content')
            <div class="alert alert-danger underline decoration-pink-500/30 text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Categorie</label>
        <select name="category_id" id="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            <option value="">-- Choisir une catégorie --</option>
            @foreach($categories as $category)
                <option @selected(old('category_id', $post->category_id) == $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category_id')
            <div class="alert alert-danger underline decoration-pink-500/30 text-red-500">{{ $message }}</div>
        @enderror
    </div>
    @php
        $tagsIds = $post->tags()->pluck('id')
    @endphp
    <div class="mb-4">
        <label for="tag" class="block text-gray-700 text-sm font-bold mb-2">Tags</label>
        <select name="tags[]" id="tag" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" data-te-select-init multiple>
            @foreach($tags as $tag)
                <option @selected($tagsIds->contains($tag->id)) value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tags')
            <div class="alert alert-danger underline decoration-pink-500/30 text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
        @if($post->id)
            @method('PATCH')
            Modifier
        @else
            @method('POST')
            Créer
        @endif
    </button>
</form>
