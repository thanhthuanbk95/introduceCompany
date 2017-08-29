<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Paper;
use App\ParentCat;
use App\User;
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
        //dem so danh muc hien tai
        $parent_count = ParentCat::count();
        //dem so tieu muc hien tai
        $cat_count = Category::count();
        //dem so nguoi dung hien tai
        $user_count = User::count();
        //dem so bai viet hien tai
        $paper_count = Paper::count();

        //dem user,admin,superadmin
        $countUsers = User::where('level', 0)->count();
        $countAdmins = User::where('level', 1)->count();
        $countSuperAdmins = User::where('level', 2)->count();
        //user recent
        $userRecents = User::where('level', 0)->orderBy('id', 'desc')->take(4)->get();
        return view('backend.home.index',compact('parent_count','cat_count','user_count','paper_count'
                    ,'countAdmins','countSuperAdmins','countUsers','userRecents'));
    }
}
