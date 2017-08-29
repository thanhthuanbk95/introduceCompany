<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\ParentCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get list categories
        $categories = Category::orderBy('id','DESC')->paginate(10);
        //get parent name
        if(count($categories) > 0) {
            foreach ($categories as $category) {
                $parent = ParentCat::findOrFail($category->id_parent);
                if ($parent != null) {
                    $category->parent_name = $parent->name;
                }

            }
        }
        return view('backend.category.index')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get list parentcat
        $parentcat = ParentCat::all();
        return view('backend.category.create')->with('parentcat',$parentcat);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $parent = $request->parent;
        $category = new Category;
        $category->name = $name;
        $category->id_parent = $parent;
        $category->save();
        $request->session()->flash('success','Thêm tiểu mục thành công');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);
        $parentname = ParentCat::findOrFail($category->id_parent);
        $category->parent_name = $parentname->name;
        return view('backend.category.show')->with('category',$category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        //get list parentcat
        $parentcat = ParentCat::all();
        return view('backend.category.edit',compact('category','parentcat'));
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
        $parent = $request->parent;
        $category = Category::findOrFail($id);
        $category->name = $name;
        $category->id_parent = $parent;
        $category->save();
        $request->session()->flash('success','Cập nhật tiểu mục thành công!');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        $request->session()->flash('success', 'Xóa tiểu mục thành công!');
        return redirect()->route('categories.index');
    }
}
