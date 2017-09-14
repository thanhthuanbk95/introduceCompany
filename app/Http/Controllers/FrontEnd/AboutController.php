<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        //lay danh sach danh muc
        $parentcats = ParentCat::all();
        return view('frontend.about',compact('parentcats'));
    }
}
