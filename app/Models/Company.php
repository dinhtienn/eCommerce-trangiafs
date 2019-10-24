<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Company extends Model
{
    use CrudTrait;

    protected $table = 'companies';

    protected $fillable = ['email', 'phone', 'address', 'description', 'image', 'logo'];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "public";
        $destination_path = "/uploads";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        $this->attributes['image'] = "/storage/" . $this->attributes['image'];
    }

    public function setLogoAttribute($value)
    {
        $attribute_name = "logo";
        $disk = "public";
        $destination_path = "/uploads";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);
        $this->attributes['logo'] = "/storage/" . $this->attributes['logo'];
    }
}
