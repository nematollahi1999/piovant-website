<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Item;
use App\Models\Listing;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon; // For date calculations

class DashboardController extends Controller
{
    public function index()
    {
        // Calculate total items
        $totalItems = Item::count();

        // Calculate active listings
        $activeListings = Listing::where('status', 'active')->count();

        // Calculate pending offers
        // This could be specific to the authenticated user's listings,
        // or platform-wide pending offers depending on what you want to show.
        // For platform-wide:
        $pendingOffers = Offer::where('status', 'pending')->count();
        // For user-specific pending offers on their listings:
        // $pendingOffers = Auth::user()->listings()->withCount(['offers' => function ($query) {
        //     $query->where('status', 'pending');
        // }])->get()->sum('offers_count');


        // Calculate new users this month
        $newUsersThisMonth = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();

        // Fetch some recent activities (example - you'll need to define what "activity" means)
        // This is a simplified example. A real "activity feed" often involves an Activity Log package
        // or a custom polymorphic relationship. Here we just fetch recent items/listings.
        $recentItems = Item::orderBy('created_at', 'desc')->take(5)->get()->map(function($item) {
            return [
                'id' => 'item_' . $item->id,
                'type' => 'item_created',
                'description' => 'New item "' . $item->title . '" added.',
                'created_at' => $item->created_at,
            ];
        });

        $recentListings = Listing::orderBy('created_at', 'desc')->take(5)->get()->map(function($listing) {
            return [
                'id' => 'listing_' . $listing->id,
                'type' => 'listing_created',
                'description' => 'New listing for "' . $listing->item->title . '" created.',
                'created_at' => $listing->created_at,
            ];
        });

        $recentActivities = $recentItems->concat($recentListings)
                                       ->sortByDesc('created_at')
                                       ->take(5) // Get top 5 most recent overall
                                       ->values() // Re-index array
                                       ->toArray();


        return Inertia::render('Dashboard', [
            'title' => 'Dashboard',
            'totalItems' => $totalItems,
            'activeListings' => $activeListings,
            'pendingOffers' => $pendingOffers,
            'newUsersThisMonth' => $newUsersThisMonth,
            'recentActivities' => $recentActivities,
        ]);
    }
}