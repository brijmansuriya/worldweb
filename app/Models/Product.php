<?php

namespace App\Models;
use App\Models\Categories;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $fillable = [
        'title',
        'description',
        'image',
        'price',
        'status',
    ];
   
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Categories::class, 'product_category');
    }

    public function deleteImage()
    {
        $this->getFirstMedia('product/image') ? $this->getFirstMedia('product/image')->delete() : null;
    }

    /**
     * returns the exhibitor default profile picture if found
     */
    public function getImageAttribute()
    {
        return $this->getFirstMedia('product/image') ? $this->getFirstMedia('product/image')->getFullUrl() : url('default_images/default.png');
    }
    
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
   
}
