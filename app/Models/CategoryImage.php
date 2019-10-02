<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class CategoryImage extends Model
{
    use CrudTrait;

    protected $table = 'category_images';
    public $timestamps = true;
    protected $fillable = ['id', 'category_id', 'link'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id', 'category_id');
    }
}
