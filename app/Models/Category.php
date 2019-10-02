<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Category extends Model
{
    use CrudTrait;

    protected $table = 'categories';

    protected $fillable = ['name', 'parent_id', 'depth', 'slug', 'num_products'];

    public function parent()
    {
        return $this->hasOne('App\Models\Category', 'id', 'parent_id');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'categories_id');
    }

    public function image()
    {
        return $this->hasOne('App\Models\CategoryImage', 'category_id', 'id');
    }
}
