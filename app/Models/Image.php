<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Image extends Model
{
    use CrudTrait;

    protected $table = 'images';
    public $timestamps = true;
    protected $fillable = ['id', 'product_id', 'link'];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'id');
    }
}
