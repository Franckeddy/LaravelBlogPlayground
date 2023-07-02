<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\RedirectResponse;
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
}
