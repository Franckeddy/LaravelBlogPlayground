<form method="post" action="" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf
    @method($post->id ? 'PATCH' : 'POST')
    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2"></label>
        <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="slug" class="block text-gray-700 text-sm font-bold mb-2"></label>
        <input type="text" name="slug" id="slug" value="{{ old('slug', $post->slug) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        @error('slug')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-4">
        <label for="content" class="block text-gray-700 text-sm font-bold mb-2"></label>
        <textarea name="content" id="content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('textarea', $post->content) }}</textarea>
        @error('content')
        <div class="alert alert-danger">{{ $message }}</div>
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
