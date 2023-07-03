<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    /**
     * @return View
     */
    public function index(): View {
        return view('blog.index', [
            'posts' => Post::paginate(1)
        ]);
    }

    /**
     * @param string $slug
     * @param Post $post
     * @return RedirectResponse|View
     */
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
        ]);
    }

    public function store(FormPostRequest $request) {
        $post = Post::create($request->validated());
        return to_route('blog.show', [
            'slug' => $post->slug,
            'post' => $post->id,
        ])->with('success', 'Post created successfully!');
    }

    public function edit(Post $post) {
        return view('blog.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post, FormPostRequest $request) {
        $post->update($request->validated());
        return to_route('blog.show', [
            'slug' => $post->slug,
            'post' => $post->id,
        ])->with('success', 'Post updated successfully!');
    }
}
