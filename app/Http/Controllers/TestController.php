<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use BarryDebugbar;

class TestController extends Controller
{


    public function test(Request $request)
    {
        //return $request->input('name','jack');
        $name = $request->input('name','jack');

        BarryDebugbar::info($name);
        return view('welcome',compact('name'));
    }
}
