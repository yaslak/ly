<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    public static function list(int $id)
    {
        return false;
    }

    public static function count(int $id)
    {
        return false;
    }
}
