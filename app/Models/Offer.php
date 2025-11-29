<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'listing_id',
        'offerer_id',
        'offered_item_id',
        'cash_amount_offered',
        'message',
        'status',
    ];

    protected $casts = [
        'cash_amount_offered' => 'decimal:2',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function offerer()
    {
        return $this->belongsTo(User::class, 'offerer_id'); 
    }
    public function offeredItem()
    {
        return $this->belongsTo(Item::class, 'offered_item_id'); 
    }
}