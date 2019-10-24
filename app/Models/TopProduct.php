<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class TopProduct extends Model
{
    use CrudTrait;

    protected $table = 'top_products';
    public $timestamps = true;
    protected $fillable = ['product_id'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }
}
