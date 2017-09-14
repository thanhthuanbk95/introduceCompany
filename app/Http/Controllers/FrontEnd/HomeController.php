<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Information;

class HomeController extends Controller
{
    public function index()
    {	
    	$information = Information::findOrFail(1);
        return view('frontend.index')->with('infor', $information);
    }
}
