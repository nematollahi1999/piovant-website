<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id',
        'user_id',
        'desired_items_description',
        'desired_cash_amount',
        'status',
    ];

    protected $casts = [
        'desired_cash_amount' => 'decimal:2',
    ];

    // --- Relationships ---

    /**
     * A listing belongs to an item.
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * A listing belongs to a user (the lister).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A listing can receive many offers.
     */
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
}