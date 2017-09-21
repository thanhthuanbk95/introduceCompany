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
    	$phongthuy = PhongThuy::orderBy('id','DESC')->paginate(9);
        return view('frontend.phongthuy',compact('phongthuy','infor','parentcats'));
    }

    public function showSinglePage($id){
        $parentcats = ParentCat::all();
    	$phongthuy = PhongThuy::findOrFail($id);
    	$infor = Information::findOrFail(1);
        return view('frontend.phongthuy-single', compact('parentcats','phongthuy','infor'));
    }
}
