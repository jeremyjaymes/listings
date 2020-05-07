<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreListing;
use App\Mail\ListingRequiresApproval;
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
    public function index()
    {
        $listings = Listing::where('is_approved', true)->get();
        $states = \App\State::all();
        return response()->view('listing.index', compact('listings', 'states'));
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
        return response()->view('listing.show', ['listing' => $listing]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $this->authorize('update', Listing::class);

        return response()->json([], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', Listing::class);

        return response()->json([], 200);
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
            'message' => 'Listing Deleted'
        ], 201);
    }
}
