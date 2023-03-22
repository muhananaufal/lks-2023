<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['picture', 'slug', 'title', 'description', 'color', 'price', 'status', 'brand_id', 'user_id', 'quantity'];
    use HasFactory;
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
