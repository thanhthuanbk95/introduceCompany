<?php

namespace App\Http\Controllers\FrontEnd;

use App\ParentCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Introduce;
use App\Information;

class AboutController extends Controller
{
    public function index()
    {
        //lay danh sach danh muc
        $parentcats = ParentCat::all();
    	$introduce = Introduce::findOrFail(1);
    	$infor = Information::findOrFail(1);
        return view('frontend.about',compact('parentcats','introduce','infor'));
    }
}
