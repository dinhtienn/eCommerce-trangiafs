<?php

namespace App\Models;
use Backpack\CRUD\CrudTrait;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use CrudTrait;

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
}
