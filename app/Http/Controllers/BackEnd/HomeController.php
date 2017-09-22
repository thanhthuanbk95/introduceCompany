<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Contact;
use App\Paper;
use App\ParentCat;
use App\PhongThuy;
use App\User;
use App\IndexImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //Dem so du an
        $paper_count = Category::join('papers','category.id','=','papers.id_cat')
            ->join('parentcategory','category.id_parent','=','parentcategory.id')
            ->where('id_parent','=',1)
            ->count();
        //Dem so hinh anh noi that
        $furniture_count = Category::join('papers','category.id','=','papers.id_cat')
            ->join('parentcategory','category.id_parent','=','parentcategory.id')
            ->where('id_parent','=',2)
            ->count();
        //Dem so thu chua tra loi
        $contact = Contact::where('reply','=','Chưa trả lời')
            ->count();
        //Dem so anh homapage
        $homepage_image= IndexImage::count();
        //Dem so bia viet phong thuy
        $phongthuy_count= PhongThuy::count();
        //dem so danh muc hien tai
        $parent_count = ParentCat::count();
        //dem so tieu muc hien tai
        $cat_count = Category::count();
        //dem so nguoi dung hien tai
        $user_count = User::count();
        //lay danh sach danh muc
        $parentcats = ParentCat::all();
        //dem user,admin,superadmin
        $countUsers = User::where('level', 0)->count();
        $countAdmins = User::where('level', 1)->count();
        $countSuperAdmins = User::where('level', 2)->count();
        //user recent
        $userRecents = User::where('level', 0)->orderBy('id', 'desc')->take(4)->get();
        return view('backend.home.index',compact('parent_count','cat_count','user_count','paper_count'
                    ,'countAdmins','countSuperAdmins','countUsers','userRecents','parentcats', 'homepage_image', 'furniture_count',
                    'phongthuy_count', 'contact'));
    }
}
