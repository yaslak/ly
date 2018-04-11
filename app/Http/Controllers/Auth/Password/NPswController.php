<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Requests\Auth\NpswRequest;
use App\Model\OldPassword;
use App\Model\UpdatePassword;
use App\User;
use App\Http\Controllers\Controller;

class NPswController extends Controller
{

    public function show($token)
    {
        UpdatePassword::clean();
        return (UpdatePassword::issetToken($token))
            ? view('auth.passwords.NPsw',compact('token'))
            : redirect()->route('target.index');
    }

    public function store(NpswRequest $request)
    {
        $token = UpdatePassword::issetToken($request->token);
        if(!$token){
            return redirect()->route('target.index');
        }
        $recover_id = UpdatePassword::recover_id($request->token);
        $old = OldPassword::checkOldPassword($recover_id,$request->password);
        if($old){
            return back()->withErrors(['password'=>'exist']);
        }
        User::updateOldPassword($recover_id);
        $update  = User::updatePassword($recover_id,$request->password);
        if($update){
            UpdatePassword::deleteUpdate($recover_id);
            return redirect()->route('login');
        }
        return redirect()->route('target.index');
    }
}
