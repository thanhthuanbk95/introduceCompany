<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Image;
use App\Paper;
use App\ParentCat;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papers = Paper::orderBy('id','DESC')->paginate(10);
        if(count($papers) > 0){
            foreach ($papers as $paper){
                $user = User::findOrFail($paper->id_user);
                $paper->fullname = $user->fullname;
                $category = Category::findOrFail($paper->id_cat);
                $paper->category = $category->name;
                $parent_cat = ParentCat::findOrFail($category->id_parent);
                $paper->parent_cat = $parent_cat->name;
                $images = Image::where('id_paper', '=', $paper->id)->count();
                $paper->images = $images;
            }
        }
        return view('backend.paper.index',compact('papers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $parentcats = ParentCat::all();
        return view('backend.paper.create',compact('categories','parentcats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
