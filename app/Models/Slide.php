<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Slide extends Model
{
    use CrudTrait;

    protected $table = 'slide';
    public $timestamps = true;
    protected $fillable = ['title', 'description', 'link', 'image'];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "/uploads";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        $this->attributes['image'] = "/storage/" . $this->attributes['image'];
    }
}
