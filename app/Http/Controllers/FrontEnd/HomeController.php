<?php

namespace App\Http\Controllers\FrontEnd;

use App\IndexImage;
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
        //lay danh sach random 4 anh
        $size = IndexImage::count();
        $images = null;
        if($size <= 4){
            $images = IndexImage::all();
        }else{
            $ids = IndexImage::select('id')->get();
            //random 4 anh
            $arr_ids = array();
            foreach ($ids as $id){
                array_push($arr_ids,$id->id);
            }
            $id1 = rand(0,count($arr_ids) - 1);
            $id2 = rand(0,count($arr_ids) - 1);
            while ($id1 == $id2){
                $id2 = rand(0,count($arr_ids) - 1);
            }
            $id3 = rand(0,count($arr_ids) - 1);
            while ($id1 == $id3 || $id2 == $id3){
                $id3 = rand(0,count($arr_ids) - 1);
            }
            $id4 = rand(0,count($arr_ids) - 1);
            while ($id1 == $id4 || $id2 == $id4 || $id3 == $id4){
                $id4 = rand(0,count($arr_ids) - 1);
            }
            $images = IndexImage::where('id','=',$arr_ids[$id1])
                                ->orWhere('id','=',$arr_ids[$id2])
                                ->orWhere('id','=',$arr_ids[$id3])
                                ->orWhere('id','=',$arr_ids[$id4])
                                ->get();
        }
        return view('frontend.index', compact('parentcats', 'infor','images'));
    }
}
