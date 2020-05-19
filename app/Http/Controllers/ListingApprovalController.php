<?php

namespace App\Http\Controllers;

use App\Listing;
use App\Mail\ListingApproved;
use Illuminate\Support\Facades\Mail;

class ListingApprovalController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('update', Listing::class);

        return response()->view(
            'approvals.index',
            [
                'listings' => Listing::where('is_approved', false)->get()
            ]
        );
    }

    /**
     * @param Listing $listing
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Listing $listing)
    {
        $this->authorize('update', Listing::class);

        $listing->is_approved = true;
        $listing->save();
        Mail::to($listing->contact_email)->send(new ListingApproved);

        return response()->json([
            'message' => 'Listing has been published.'
        ]);
    }
}
