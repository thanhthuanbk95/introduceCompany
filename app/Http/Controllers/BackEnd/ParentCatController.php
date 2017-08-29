<?php

namespace App\Http\Controllers\BackEnd;

use App\ParentCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ParentCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parentcats = ParentCat::orderBy('id','DESC')->paginate(10);
        return view('backend.parentcat.index')->with('parentcats',$parentcats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.parentcat.create');
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
        $parentcat = new ParentCat;
        $parentcat->name = $name;
        $parentcat->save();
        $request->session()->flash('success','Thêm danh mục thành công');
        return redirect()->route('parentcats.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $parentcat = ParentCat::findOrFail($id);
        return view('backend.parentcat.show')->with('parentcat',$parentcat);
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
        return view('backend.parentcat.edit')->with('parentcat',$parentcat);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $parentcat = ParentCat::findOrFail($id);
        $parentcat->delete();
        $request->session()->flash('success', 'Xóa danh mục thành công!');
        return redirect()->route('parentcats.index');
    }
}
