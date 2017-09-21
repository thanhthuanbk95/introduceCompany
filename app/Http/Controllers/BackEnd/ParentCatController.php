<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\ParentCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentCatController extends Controller
{
    protected $parentcats;
    function __construct()
    {
        $this->parentcats = ParentCat::all();
    }
    public function index()
    {
        $parentcats = ParentCat::orderBy('id','DESC')->paginate(10);
        return view('backend.parentcat.index')->with('parentcats',$parentcats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parentcat = ParentCat::findOrFail($id);
        return view('backend.parentcat.show')
            ->with('parentcat',$parentcat)
            ->with('parentcats',$this->parentcats);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parentcat = ParentCat::findOrFail($id);
        return view('backend.parentcat.edit')
            ->with('parentcat',$parentcat)
            ->with('parentcats',$this->parentcats);
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
        $name = $request->name;
        $parentcat = ParentCat::findOrFail($id);
        $parentcat->name = $name;
        $parentcat->save();
        $request->session()->flash('success','Cập nhật danh mục thành công!');
        return redirect()->route('parentcats.index');
    }

    public function setCategories(Request $request){
        $id_parent = $request->id_parent;
        //lay danh sach tieu muc
        $categories = Category::where('id_parent','=',$id_parent)->get();
        $output = "<div class=\"col-sm-12\">
                                <label for=\"category\">Chọn tiểu mục:</label><select name=\"category\" class=\"form-control\">";
        foreach ($categories as $category){
            $output = $output . "<option value=\"$category->id\">$category->name</option>";
        }
        $output = $output . "</select></div><div class=\"clearfix\"></div>";
        echo $output;
    }
}
