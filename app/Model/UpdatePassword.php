<?php

namespace App\Model;

use App\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UpdatePassword extends Model
{
    public $fillable = [
      'last_password','sq','token','code','updated_at','created_at','recover_id'
    ];

    /**
     * clean table for the old update
     * @return mixed
     */
    public static function clean()
    {
        return self::where('updated_at','<',\gmdate('Y-m-d H:i:s',strtotime("- 3 minutes")))->delete();
    }

    /**
     * verify recovered account
     * @param $request
     * @return bool
     */
    public static function irrecoverable($request)
    {
        $target = User::target($request->target);
        if (!$target || !$target->recover_id){
            return false;
        }
        return $target->recover_id;
    }

    /**
     * get the old or new token
     * @param $recover_id
     * @return string
     */
    public static function token($recover_id)
    {
        $token = self::where('recover_id',$recover_id)->first();
        return ($token) ? $token->token : self::createToken($recover_id);
    }

    /**
     * create a new token
     * @param $recover_id
     * @return string
     */
    private static function createToken($recover_id)
    {
        $code = rand();
        $token = sha1(md5(rand()));
        self::insert([
            'recover_id'    => $recover_id,
            'token'         => $token,
            'code'          =>$code,
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ]);
        return $token;
    }

    /**
     * check token
     * @param $token
     * @return mixed
     */
    public static function issetToken($token)
    {
        return self::where('token',$token)->first();
    }

    /**
     * get code of this token
     * @param string $token
     * @return string|bool
     */
    public static function code($token)
    {
        $code = self::where('token',$token)->select('code')->first();
        return ($code) ? $code->code : false;
    }

    /**
     * update code of this token
     * @param string $token
     * @return mixed
     */
    public static function validateMail($token)
    {
        return self::where('token',$token)->update([
            'code'          => false,
            'updated_at'    => Carbon::now()
            ]);
    }

    /**
     * get id with token
     * @param string $token
     * @return bool
     */
    public static function recover_id(string $token)
    {
        $recover_id = self::where('token',$token)->select('recover_id')->first();
        return ($recover_id) ? $recover_id->recover_id : false;
    }

    /**
     * delete update password
     * @param $recover_id
     * @return mixed
     */
    public static function deleteUpdate($recover_id)
    {
        return self::where('recover_id',$recover_id)->delete();
    }
}
