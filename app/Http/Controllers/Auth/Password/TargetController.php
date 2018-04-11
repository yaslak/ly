<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Requests\Auth\TargetRequest;
use App\Model\UpdatePassword;
use App\Http\Controllers\Controller;

class TargetController extends Controller
{
    /**
     * clean update password table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
       UpdatePassword::clean();
       return view('auth.passwords.target');
    }

    /**
     * target account and verify if recovered and redirect with new or old token
     * @param TargetRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */

    public function store(TargetRequest $request)
    {
        $recover_id = UpdatePassword::irrecoverable($request);
        if($recover_id){
            $token = UpdatePassword::token($recover_id);
            return redirect()->route('mail.show',['token'=>$token]);
        }
        return view('auth.passwords.irrecoverable');
    }
}
