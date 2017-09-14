<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Introduce;
use App\Information;

class AboutController extends Controller
{
    public function index()
    {
    	$introduce = Introduce::findOrFail(1);
    	$information = Information::findOrFail(1);
        return view('frontend.about')->with('introduce', $introduce)->with('infor', $information);
    }
}
