<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ParentCat;
use App\Information;
class HomeController extends Controller
{
    public function index()
    {
        //lay danh sach danh muc
        $parentcats = ParentCat::all();
        $infor = Information::findOrFail(1);
        return view('frontend.index', compact('parentcats', 'infor'));
    }
}
