<?php

namespace App\Http\Controllers\FrontEnd;

use App\ParentCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhongThuy;
use Illuminate\Pagination\Paginator;
use App\Information;

class PhongThuyController extends Controller
{
    public function index()
    {
        $parentcats = ParentCat::all();
    	$infor = Information::findOrFail(1);
    	$phongthuy = PhongThuy::orderBy('id','DESC')->paginate(3);
        return view('frontend.phongthuy',compact('phongthuy','infor','parentcats'));
    }

    public function showSinglePage($id){
    	$phongthuy = PhongThuy::findOrFail($id);
    	$information = Information::findOrFail(1);
        return view('frontend.phongthuy-single')->with('phongthuy', $phongthuy)->with('infor', $information);
    }
}
