<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Company extends Model
{
    use CrudTrait;

    protected $table = 'companies';

    protected $fillable = ['email', 'phone', 'address', 'description', 'full_slide', 'img', 'logo', 'men_img', 'women_img'];
}
