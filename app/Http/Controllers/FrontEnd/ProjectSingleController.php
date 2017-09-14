<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Information;

class ProjectSingleController extends Controller
{
    public function index()
    {	
    	$information = Information::findOrFail(1);
        return view('frontend.project-single')->with('infor', $information);
    }
}
