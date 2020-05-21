<?php

namespace App\Composers;

use App\Category;
use App\State;
use App\Tag;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ListingCreationComposer
{
    public function __construct()
    {
        $this->states = Cache::rememberForever('states', function () {
            return State::all();
        });

        $this->categories = Cache::remember('categories', 24*60, function () {
            return Category::orderBy('name')->get();
        });

        $this->tags = Cache::remember('tags', 24*60, function () {
            return Tag::all()->pluck('name');
        });
    }

    public function compose(View $view)
    {
        $view->with('states', $this->states);
        $view->with('categories', $this->categories);
        $view->with('tags', $this->tags);
    }
}
