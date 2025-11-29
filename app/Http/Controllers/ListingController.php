<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Listing;

class ListingController extends Controller
{
    /**
     * Display a paginated list of listings.
     */
    public function index(Request $request)
    {
        $listings = Listing::with(['item','user'])->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        return Inertia::render('listings/Index', [
            'listings' => $listings,
        ]);
    }

    /**
     * Display a single listing.
     */
    public function show(Listing $listing)
    {
        $listing->load(['item','user','offers']);

        return Inertia::render('listings/Show', [
            'listing' => $listing,
        ]);
    }
}
