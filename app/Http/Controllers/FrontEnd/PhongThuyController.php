<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhongThuy;
use Illuminate\Pagination\Paginator;

class PhongThuyController extends Controller
{
    public function index()
    {	
    	$phongthuy = PhongThuy::orderBy('id','DESC')->paginate(3);
        return view('frontend.phongthuy')->with('phongthuy', $phongthuy);
    }

    public function showSinglePage($id){
    	$phongthuy = PhongThuy::findOrFail($id);
        return view('frontend.phongthuy-single')->with('phongthuy', $phongthuy);
    }
}
