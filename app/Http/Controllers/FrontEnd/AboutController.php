<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Introduce;

class AboutController extends Controller
{
    public function index()
    {
    	$introduce = Introduce::findOrFail(1);
        return view('frontend.about')->with('introduce', $introduce);
    }
}
