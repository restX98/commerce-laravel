<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    protected function getUrlAttribute() {
        return url("/product/$this->cod");
    }

    protected function getImageAttribute() {
        return url("https://picsum.photos/id/$this->id/600");
    }
}
