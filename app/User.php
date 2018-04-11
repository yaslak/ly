<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
        'first_name','last_name',
        'dtn','sex','address',
        'house_nbr','city','tel',
        'photo_profil_id','photo_cover_id',
        'recover_id','society_id','post_id'
    ];

    public $guarded = ['is_admin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function target($name)
    {
        return self::where('email',$name)->orWhere('name',$name)->first();
    }

    /**
     * insert new password
     * @param $id
     * @param $password
     * @return mixed
     */
    public static function updatePassword($id, $password)
    {
        return self::where('recover_id',$id)->update([
            'password' => bcrypt($password)
        ]);
    }

    public static function updateOldPassword($recover_id)
    {
        $password = self::where('recover_id',$recover_id)->first();
        DB::table('old_passwords')->insert([
            'recover_id' => $recover_id,
            'password' => $password->password,
            'created_at' => Carbon::now()
        ]);
    }
}
