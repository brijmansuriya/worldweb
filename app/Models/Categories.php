<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Categories extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = ['title', 'description', 'image', 'status'];

    public function deleteImage()
    {
        $this->getFirstMedia('image') ? $this->getFirstMedia('image')->delete() : null;
    }

    /**
     * returns the exhibitor default profile picture if found
     */
    public function getImageAttribute()
    {
        return $this->getFirstMedia('image') ? $this->getFirstMedia('image')->getFullUrl() : url('default_images/default.png');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}