<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Offer;

class OfferController extends Controller
{
    public function index(Request $request)
    {
        $offers = Offer::with(['offeredItem','offerer'])->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        return Inertia::render('offers/Index', [
            'offers' => $offers,
        ]);
    }

    public function show(Offer $offer)
    {
        $offer->load(['offeredItem','offerer']);

        return Inertia::render('offers/Show', [
            'offer' => $offer,
        ]);
    }
}
