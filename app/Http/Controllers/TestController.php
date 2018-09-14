<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Debugbar;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class TestController extends Controller
{


    /**
     * 包自动发现Test
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function test(Request $request)
    {
        //$res = DB::
        //$res = DB::where('name','=','jack')->()
        ////return $request->input('name','jack');
        //$name = $request->input('name', 'jack');
        //
        //Debugbar::info($name . date('Y-m-d H:i:s') . '访问了页面！');
        //return view('welcome', compact('name'));
        $c = app();
        //var_dump($c->bindings);
        echo '<pre>';
        $k = [];
        foreach($c->bindings as $key => $value)
        {
            print_r($value);
        }

        echo '</pre>';

    }
}
