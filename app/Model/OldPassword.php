<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class OldPassword extends Model
{
    public $fillable = [
        'recover_id','password','created_at'
    ];

    public $timestamps = false;

    /**
     * check password in old password
     * @param $recover_id
     * @param $password
     * @return bool
     */
    public static function checkOldPassword($recover_id, $password)
    {
        $olds = self::where('recover_id',$recover_id)->get();

        if(isset($olds[0]->password)){
            foreach ($olds as $old){
                if(Hash::check($password,$old->password)){
                    return true;
                }
            }
        }
        return false;
    }
}
