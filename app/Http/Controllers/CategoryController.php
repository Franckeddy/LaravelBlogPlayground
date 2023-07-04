<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\Pagination\Paginator;

class CategoryController extends Controller
{
    public function index() {
        return view('cat.index', [
            'categories' => Category::all()
        ]);
    }

    public function show(Category $category): Paginator {
        $category->posts()->paginate(10);
        return view('cat.show', [
            'category' => $category
        ]);
    }

    public function create() {
        $category = new Category();
        return view('cat.create', [
            'category' => $category
        ]);
    }
}
