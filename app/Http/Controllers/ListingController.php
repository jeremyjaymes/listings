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
use Illuminate\Support\Facades\Cache;
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
        $listings = Cache::remember('listings', 18*60, function () {
            return Listing::where('is_approved', true)
                ->with('tags', 'categories')
                ->orderBy('created_at', 'DESC')
                ->get();
        });

        if ($request->category) {
            $listings->whereCategory($request->category);
        }

        $term = null;
        if ($request->term) {
            $term = $request->term;
            $listings = Listing::search($request->term)->get();
        }

        return response()->view('listing.index',
            compact('listings','term'));
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
        $this->purge('listings');
        $listing = Listing::create($request->input());

        if ($request->tagsArray) {
            $this->purge('tags');
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

        return response()->view('listing.edit', [
            'listing' => $listing,
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
