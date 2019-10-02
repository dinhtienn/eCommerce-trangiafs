<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Slide extends Model
{
    use CrudTrait;

    protected $table = 'slide';
    public $timestamps = true;
    protected $fillable = ['id', 'title', 'description', 'link', 'img'];
}
