<?php

namespace App\Model;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Recover extends Model
{
    public $fillable = [
        'email','token','secret_question_id','response',"update_at","created_at"
    ];

    /**
     * has recovered
     * @return mixed recover_id | null
     */

    public static function recovered()
    {
        return DB::table('users')
            ->leftJoin('recovers','users.recover_id','=','recovers.id')
            ->where([['users.id',Auth::user()->id]])
            ->select('recovers.*')->first();
    }

    /**
     *
     * @param int $id user
     */
    public static function recoverStore(int $id)
    {
        $recover_id = self::insertGetId([
            'token' => rand(),
            'email' => false,
            'updated_at' => Carbon::now(),
            'created_at' => Carbon::now()
            ]);
        DB::table('users')->where('id',$id)->update(['recover_id'=>$recover_id]);
    }

    /**
     * get token
     * @param int $id user
     */

    public static function token(int $id)
    {
        return DB::table('users')
            ->leftJoin('recovers','users.recover_id','=','recovers.id')
            ->where('users.id',$id)
            ->select('users.email','recovers.token')
            ->first();
    }

    /**
     * @param $value
     * @return mixed
     */

    public static function issetToken($value)
    {
        return self::where([
            ['id', Auth::user()->recover_id],
            ['token',$value]
        ])->first();
    }

    /**
     * update email value with false
     * @param $token
     * @return mixed
     */

    public static function verifiedMail($token)
    {
        return self::where([
            ['token',$token],
            ['id',Auth::user()->recover_id]
        ])->update([
            'token' => false,
            'email' => true,
            'updated_at' => Carbon::now()
        ]);
    }

    /**
     * store question and response
     * @param $id
     * @param $request
     * @return mixed
     */
    public static function SqStore($id,$request)
    {
        return DB::table('recovers')
            ->where('id',$id)
            ->update([
                'question_secrete_id'    => $request->question,
                'response'               => $request->response,
                'updated_at'              => Carbon::now()
            ]);
    }

    /**
     * get sq value and id
     * @param $recover_id
     */
    public static function getQuestion($recover_id)
    {
        return DB::table('recovers')
            ->leftJoin('secret_questions','recovers.question_secrete_id','=','secret_questions.id')
            ->where('recovers.id',$recover_id)
            ->select('secret_questions.*')
            ->first();
    }



    public static function response($recover_id,$response)
    {
        return self::where([['id',$recover_id],['response',$response]])->first();
    }

}
