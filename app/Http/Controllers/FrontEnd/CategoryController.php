<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paper;
use App\ParentCat;
class CategoryController extends Controller
{
    public function index(Request $request){
        $id = $request->id;
        //lay danh sach danh muc
        $parentcats = ParentCat::all();
    }
}
