<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    public function index()
    {
        $sql = "
            SELECT * FROM test WHERE id >= :id
        ";
        $result = DB::select($sql, [':id' => 4]);

        dd($result);
    }
}
