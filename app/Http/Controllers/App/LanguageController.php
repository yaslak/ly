<?php

namespace App\Http\controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    /**
     * @desc To change the Current language
     * @request ajax
     * @param Request $request
     */

    public function changeLanguage(Request $request)
    {
        if($request->ajax()){
            $request->session()->put('locale',$request->locale);
        }
    }
}
