<?php

namespace App\Http\Controllers\FrontEnd;

use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\ParentCat;
use App\Paper;
use App\User;
class ParentCatController extends Controller
{
    protected $parentcats;
    public function __construct(){
        //lay danh sach danh muc
        $this->parentcats = ParentCat::all();
    }
    public function index(Request $request){
        $parentcats = $this->parentcats;
        $id = $request->id;
        //lay danh sach tieu muc
        $categories = Category::where('id_parent','=',$id)->get();
        $papers = null;
        if(count($categories) > 0){
            //lay bai viet cua danh muc dau tien
            $papers = Paper::where('id_cat','=',$categories[0]->id)->paginate(1);
            if(count($papers) > 0){
                foreach($papers as $paper){
                    //lay ten nguoi dung dang bai viet
                    $user = User::findOrFail($paper->id_user);
                    $paper->user = $user->fullname;
                    //lay hinh anh dau tien cua bai viet
                    $images = Image::where('id_paper','=',$paper->id)->get();
                    if(count($images) > 0){
                        $index = rand(0,count($images)-1);
                        $paper->image = $images[$index]->name;
                    }else{
                        $paper->image = 'default.jpg';
                    }
                }
            }
        }
        // dd(count($papers));
        return view('frontend.project',compact('parentcats','categories','papers'));
    }
}
