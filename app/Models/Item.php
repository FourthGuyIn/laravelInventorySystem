<?php

// app/Models/Item.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'price',
        'quantity',
        'SKU',
        'picture',
        // Add other attributes as needed
    ];

    
}