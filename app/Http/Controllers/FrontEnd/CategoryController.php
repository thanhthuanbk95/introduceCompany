<?php

namespace App\Http\Controllers\FrontEnd;

use App\Category;
use App\Image;
use App\Information;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paper;
use App\ParentCat;
class CategoryController extends Controller
{
    protected $parentcats;
    protected $infor;
    function __construct()
    {
        $this->parentcats = ParentCat::all();
        $this->infor = Information::findOrFail(1);
    }

    public function index(Request $request){
        $id = $request->id;
        //lay danh sach danh muc
        $parentcats = $this->parentcats;
        $infor = $this->infor;
        $papers = Paper::where('id_cat','=',$id)->paginate(6);

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
                }
                // else{
                //     $paper->image = 'default.jpg';
                // }
            }
        }
        //lay danh sach tieu muc
        $category = Category::findOrFail($id);
        $categories = Category::where('id_parent','=',$category->id_parent)->get();
        return view('frontend.project',compact('parentcats','infor','papers','categories'));
    }
}
