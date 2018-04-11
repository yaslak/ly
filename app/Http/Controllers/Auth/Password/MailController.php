<?php

namespace App\Http\Controllers\Auth\Password;

use App\Http\Requests\Auth\MailRequest;
use App\Model\UpdatePassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function show($token)
    {
        UpdatePassword::clean();
        return (UpdatePassword::issetToken($token))
            ? view('auth.passwords.mail',compact('token'))
            : redirect()->route('target.index');
    }

    public function store(MailRequest $request)
    {
        $token = $request->token;
        return (UpdatePassword::issetToken($token))
            ? ($request->code === UpdatePassword::code($token))
                ? (UpdatePassword::validateMail($token))
                    ? redirect()->route('sq.show',['token'=>$token])
                    : redirect()->route('target.index')
                : back()->withErrors(['code'=>trans('validation.not_in')])->withInput(['code'=>$request->code])
            : redirect()->route('target.index');
    }
}
