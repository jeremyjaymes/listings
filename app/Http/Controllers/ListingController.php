<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use App\Http\Requests\StoreListing;
use App\Mail\ListingRequiresApproval;
use App\Category;
use App\Tag;
use Illuminate\Http\Request;
use App\Listing;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SearchRequest $request)
    {

        $listings = Listing::where('is_approved', true)
            ->with('tags', 'categories')
            ->get();

        if ($request->category) {
            $listings->whereCategory($request->category);
        }

        $states = \App\State::all();
        $categories = Category::orderBy('name')->get();
        $tags = Tag::all()->pluck('name');

        $term = null;
        if ($request->term) {
            $term = $request->term;
            $listings = Listing::search($request->term)->get();
        }

        return response()->view('listing.index',
            compact('listings', 'states', 'term', 'categories', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('listing.create', ['states' => \App\State::all()]);
    }

    /**
     * @param StoreListing $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreListing $request)
    {
        $listing = Listing::create($request->input());

        if ($request->tagsArray) {
            foreach ($request->tagsArray as $tag) {
                $t = Tag::create(['name' => $tag['value']]);
                $listing->tags()->attach($t->id);
            }
        }

        $listing->categories()->attach($request->category_id);

        if ($listing) {
            Mail::to(env('ADMIN_EMAIL'))->send(new ListingRequiresApproval());
        }

        return response()->json([
            'message' => 'Your listing has been submitted, you will be notified when it is approved.'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        return response()->view('listing.show', ['listing' => $listing->load('tags', 'categories')]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        $this->authorize('update', Listing::class);
        $states = \App\State::all();
        $categories = Category::withCount('listings')->orderBy('name')->get();
        $tags = Tag::all()->pluck('name');

        return response()->view('listing.edit', [
            'listing' => $listing,
            'categories' => $categories,
            'states' => $states,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Listing $listing)
    {
        $this->authorize('update', Listing::class);
        $listing->update($request->input());

        \Log::info($request->input());

        return response()->json(['message' => "Listing Updated"], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', Listing::class);

        Listing::destroy($id);
        return response()->json([
            'message' => 'Listing Deleted',
            'url' => route('home')
        ], 201);
    }
}
