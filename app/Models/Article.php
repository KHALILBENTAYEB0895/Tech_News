<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class Article extends Model
{
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

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
