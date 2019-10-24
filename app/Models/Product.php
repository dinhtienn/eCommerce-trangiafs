<?php

namespace App\Models;
use Backpack\CRUD\CrudTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use CrudTrait;
    use HasSlug;

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = ['id', 'name', 'categories_id', 'price', 'description', 'short_description', 'status'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'categories_id');
    }

    public function images()
    {
        return $this->hasMany('App\Models\Image');
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
