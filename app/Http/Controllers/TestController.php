<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Debugbar;

class TestController extends Controller
{


    public function test(Request $request)
    {
        //return $request->input('name','jack');
        $name = $request->input('name', 'jack');

        Debugbar::info($name . date('Y-m-d H:i:s') . '访问了页面！');
        return view('welcome', compact('name'));
    }
}
