<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /***
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('categories.create', ['categories' => Category::all()]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->purge('categories');

        Category::create($request->input());

        return response()->json([
            'message' => 'Category created.'
        ], 200);
    }
}
