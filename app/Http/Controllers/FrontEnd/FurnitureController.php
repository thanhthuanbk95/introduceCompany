<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paper;
use App\Information;

class FurnitureController extends Controller
{
    public function index()
    {	
    	$papers = Paper::orderBy('id','DESC')->paginate(3);
    	$information = Information::findOrFail(1);
        return view('frontend.furniture')->with('infor', $information);
    }
}
