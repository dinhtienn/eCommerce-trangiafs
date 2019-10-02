<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class TopProduct extends Model
{
    use CrudTrait;

    protected $table = 'top_products';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id', 'product_id'];

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id');
    }
}
