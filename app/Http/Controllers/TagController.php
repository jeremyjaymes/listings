<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show()
    {
        return response()->json([
            'tags' => Tag::all()->pluck('name')
        ]);
    }
}
