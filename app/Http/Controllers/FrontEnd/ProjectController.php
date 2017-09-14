<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Information;

class ProjectController extends Controller
{
    public function index()
    {	
    	$information = Information::findOrFail(1);
        return view('frontend.project')->with('infor', $information);
    }
}
