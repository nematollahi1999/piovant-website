<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index()
    {
         $items = Item::with(['item','user'])->orderBy('created_at', 'desc')->paginate(12)->withQueryString();

        return Inertia::render('items/Index', [
            'items' => $items,
        ]);

    }
}
