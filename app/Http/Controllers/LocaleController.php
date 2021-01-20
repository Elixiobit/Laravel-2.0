<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{


    public function changeLanguage(Request $request)
    {
        session()->put('language', $request['language']);
        return redirect()->back();
    }
}
