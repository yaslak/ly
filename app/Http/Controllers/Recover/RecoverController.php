<?php

namespace App\Http\Controllers\Recover;

use App\Mail\RecoverMail;
use App\Model\Recover;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RecoverController extends Controller
{

    public function index()
    {
        if(Recover::recovered()->id){return redirect()->route('recover.mail');}
        return view('recover.recover');
    }

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        Recover::recoverStore($id);
        $mail = $this->mail($id);
        return redirect()->route('recover.mail');
    }

    private function mail(int $id)
    {
        $mail = Recover::token($id);
        Mail::to('yasslakh@gmail.com')->send(new RecoverMail($mail->token));
    }


}
