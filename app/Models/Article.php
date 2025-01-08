<?php

namespace App\Models;

use Conner\Tagging\Taggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\SlugOptions;
use Spatie\Sluggable\HasSlug;

class Article extends Model
{  
    use HasFactory, HasSlug, Taggable;

    protected $fillable = [
    'title', 
    'slug',
    'image',
    'description',
    'isActive',
    'isComment',
    'isSharable',
    
    'category_id',
    'author_id'];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function imageUrl(): string
    {
        return Storage::url($this->image);
    }

    public function category(): BelongsTo 
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }
}
