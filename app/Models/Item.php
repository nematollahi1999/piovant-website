<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'condition',
        'estimated_value',
        'image_url',
        'additional_images',
        'status',
    ];

    protected $casts = [
        'additional_images' => 'array', // Cast JSON column to array
        'estimated_value' => 'decimal:2', // Ensure value is cast to decimal
    ];

    // --- Relationships ---

    /**
     * An item belongs to a user (its owner).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * An item belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * An item can be part of a listing.
     */
    public function listing()
    {
        return $this->hasOne(Listing::class);
    }

    /**
     * An item can be offered in multiple offers.
     */
    public function offers()
    {
        return $this->hasMany(Offer::class, 'offered_item_id'); // Specify foreign key
    }
}