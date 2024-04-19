<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyListing extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'listing_id',
        'status',
        'price',
        'street_view_url',
        'bedrooms',
        'bathrooms',
        'square_footage',
        'lot_size',
        'address_street',
        'address_city',
        'address_state',
        'address_zip',
        'photo_count',
    ];

    protected $table = 'property_listings';
}
