<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Image;
use App\Information;
use App\Paper;
use App\ParentCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaperController extends Controller
{
    protected $parentcats;
    protected $infor;
    function __construct()
    {
        $this->parentcats = ParentCat::all();
        $this->infor = Information::findOrFail(1);
    }
    public function index(Request $request){
        $parentcats = $this->parentcats;
        $infor = $this->infor;
        $id = $request->id;
        $paper = Paper::findOrFail($id);
        //tang luot view len 1
        $paper->seen = $paper->seen + 1;
        $paper->save();
        //lay tieu muc
        $category = Category::findOrFail($paper->id_cat);
        //lay danh muc
        $parentcat = ParentCat::findOrFail($category->id_parent);
        //lay danh sach anh
        $images = Image::where('id_paper','=',$paper->id)->get();
        return view('frontend.project-single',compact('parentcats','paper','images','infor','parentcat'));
    }

}
