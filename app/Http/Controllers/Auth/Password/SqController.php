<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Requests\Auth\SqRequest;
use App\Model\Recover;
use App\Model\UpdatePassword;
use App\Http\Controllers\Controller;

class SqController extends Controller
{

    public function show($token)
    {
        UpdatePassword::clean();
        $isset = UpdatePassword::issetToken($token);
        if($isset){
            $recover_id = UpdatePassword::recover_id($token);
            if($recover_id){
                $question = Recover::getQuestion($recover_id);
                if($question){
                    return view('auth.passwords.sq',[
                        'question'=>$question->question,
                        'token' => $token
                    ]);
                }
            }
        }
        return redirect()->route('target.index');
    }

    public function store(SqRequest $request)
    {
        $isset = UpdatePassword::issetToken($request->token);
        if($isset){
            $recover_id = UpdatePassword::recover_id($request->token);
            if($recover_id){
                $response = Recover::response($recover_id,$request->response);
                if($response){
                    return redirect()->route('NPsw.show',['token'=>$request->token]);
                }
                return back()->withErrors(['response'=>trans('validation.not_in')])->withInput(['response']);

            }
        }
        return redirect()->route('target.index');
    }
}
