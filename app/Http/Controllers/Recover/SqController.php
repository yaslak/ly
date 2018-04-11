<?php

namespace App\Http\Controllers\Recover;

use App\Http\Requests\Recover\SqRequest;
use App\Model\Recover;
use App\Model\Secret_question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SqController extends Controller
{
    public function index()
    {
        $recover = Recover::recovered();
        if(!$recover->id){return redirect()->route('recover');}
        if(!$recover->email){return redirect()->route('recover.mail');}
        if($recover->response && $recover->response){return view('recover.recovered');}
        return $this->show();
    }

    public function show()
    {
        return view('recover.sq')->with(['questions'=>Secret_question::list()]);
    }

    public function store(SqRequest $request)
    {
        $id = Recover::recovered()->id;
        Recover::SqStore($id,$request);
        return redirect()->route('home');
    }
}
