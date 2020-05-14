<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return response()->view('categories.create', ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        Category::create($request->input());

        return response()->json([
            'message' => 'Category created.'
        ], 200);
    }
}
