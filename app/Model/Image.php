<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $fillable = ['image_name'];

    public $timestamps = false;
}
