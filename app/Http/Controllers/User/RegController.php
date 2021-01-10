<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegController extends Controller
{
    public function index()
    {
        echo 'ZAKAZNEXT!!!';

    }

    public function createForm()
    {
        return view('user.reg');
    }

    public function formSubmit(Request $request)
    {
        return redirect()->route('user::reg::create');
    }
}
