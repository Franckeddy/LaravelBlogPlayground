<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Validation\Rule;
use Illuminate\Http\UploadedFile;

class BlogController extends Controller {
    public function index(): View {
        return view('blog.index', [
            'posts' => Post::with('category', 'tags')->paginate(10)
        ]);
    }

    public function show(string $slug, Post $post): RedirectResponse | View {
        if ($post->slug !== $slug) {
            return to_route('blog.show', [
                'slug' => $post->slug,
                'id' => $post->id,
            ]);
        }
        return view('blog.show', [
            'post' => $post
        ]);
    }

    public function create() {
        $post = new Post();
        return view('blog.create', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    public function store(FormPostRequest $request) {
        $post = Post::create($this->extractData(new Post(), $request));
        $post->tags()->sync($request->validated('tags'));
        return to_route('blog.show', [
            'title' => $post->title, // 'title' => 'My first post
            'slug' => $post->slug,
            'post' => $post->id,
        ])->with('success', 'Post created successfully!');
    }

    public function edit(Post $post) {
        return view('blog.edit', [
            'post' => $post,
            'categories' => Category::select('id', 'name')->get(),
            'tags' => Tag::select('id', 'name')->get(),
        ]);
    }

    public function update(Post $post, FormPostRequest $request) {
        $post->update($this->extractData($post, $request));
        $post->tags()->sync($request->validated('tags'));
        return to_route('blog.show', [
            'slug' => $post->slug,
            'post' => $post->id,
        ])->with('success', 'Post updated successfully!');
    }

    private function extractData(Post $post, FormPostRequest $request): array {
        $data = $request->validated();
        /**
         * @var UploadedFile|null $image
         */
        $image = $request->validated('image');
        if ($image === null || $image->geterror()) {
            return $data;
        }
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
        }
        $data['image'] = $image->store('blog', 'public');
        return $data;
    }
}
