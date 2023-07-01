<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $search = $filters['search'];
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('cod', 'like', '%' . $search . '%')
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%');
                });
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    protected function getUrlAttribute()
    {
        return url("/product/$this->cod");
    }

    protected function getImageAttribute()
    {
        return url("https://picsum.photos/id/$this->id/600");
    }

    public function item()
    {
        return $this->hasOne(Item::class, 'product_id');
    }
}
