<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Secret_question extends Model
{
    public $fillable = ['question'];

    public $timestamps = false;

    public static function list()
    {
        return self::all();
    }
}
