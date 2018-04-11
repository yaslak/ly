<?php

namespace App\Http\Controllers\Recover;

use App\Http\Requests\Recover\TokenRequest;
use App\Http\Controllers\Controller;
use App\Model\Recover;

class MailController extends Controller
{
    public function index()
    {
        if(!Recover::recovered()->id){return redirect()->route('recover');}
        if(Recover::recovered()->email){return redirect()->route('recover.sq');}
        return $this->show();
    }

    private function show()
    {
        return  view('recover.email');
    }

    public function store(TokenRequest $request)
    {
        Recover::verifiedMail($request->token);
        return redirect()->route('recover.sq');
    }
}
