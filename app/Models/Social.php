<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Social extends Model
{
    use CrudTrait;

    protected $table = 'social';
    public $timestamps = true;
    protected $fillable = ['id', 'social', 'link'];
}
