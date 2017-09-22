<?php

namespace App\Http\Controllers\BackEnd;

use App\Furniture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Image;
use App\Paper;
use App\ParentCat;
use App\User;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $idParent;
    function __construct()
    {
        $this->middleware('auth');
        $this->idParent = 2; //Noi That
    }

    public function index()
    {
        $furnitures = Category::join('papers','category.id','=','papers.id_cat')
            ->join('parentcategory','category.id_parent','=','parentcategory.id')
            ->where('id_parent','=',$this->idParent)
            ->orderby('id','DESC')
            ->select(['papers.*'])
            ->paginate(5);
        if(count($furnitures) > 0){
            foreach ($furnitures as $paper){
                $user = User::findOrFail($paper->id_user);
                $paper->fullname = $user->fullname;
                $category = Category::findOrFail($paper->id_cat);
                $paper->category = $category->name;
                $image = Image::where('id_paper', $paper->id)->first();
                if(!empty($image)) {
                    $paper->image = $image->name;
                }
            }
        }
        return view('backend.furniture.index',compact('furnitures'))
            ->with('idParent',$this->idParent);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idParent = $this->idParent;
        $categories = Category::all();
        return view('backend.furniture.create',compact('categories'))
            ->with('idParent',$idParent);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $furniture = new Furniture();
        $furniture->title = $request->title;
        $furniture->id_cat = $request->category;
        $furniture->id_user = Auth::user()->id;
        $furniture->seen = 0;
        $furniture->describe = "";
        $imagename = "";
        if($request->hasFile("upload")){
            $image = $request->upload;
            $image = $request->file('upload')->store('public/images');
            $arr_filename = explode("/",$image);
            $imagename = end($arr_filename);
        }
        $furniture->save();
        //luu thong tin anh vao db

        $imageSave = new Image();
        $imageSave->id_paper = $furniture->id;
        $imageSave->name = $imagename;
        $imageSave->save();

        return redirect()->route('furniture.index');
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
    public function edit(Request $request,$id)
    {
        $idParent = $this->idParent;
        $furniture = Furniture::findOrFail($id);
        if($furniture->id_user != Auth::user()->id && Auth::user()->level < 2){
            $request->session()->flash('fail','Bạn không thể thay đổi nội dung bài viết của người khác!');
            return redirect()->back();
        }
        //lay ds danh muc va tieu muc
        $categories = Category::all();
        //lay danh sach anh
        $image = Image::where('id_paper', $furniture->id)->first();
        if(!empty($image)){
            $furniture->image = $image->name;
        }
        return view('backend.furniture.edit ',compact('furniture','categories', 'idParent'));
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
        $furniture = Furniture::FindOrFail($id);
        if($furniture->id_user != Auth::user()->id && Auth::user()->level < 2){
            $request->session()->flash('fail','Bạn không thể thay đổi nội dung bài viết của người khác!');
            return redirect()->back();
        }
        $furniture->title = $request->title;
        $furniture->id_cat = $request->category;
        $furniture->id_user = Auth::user()->id;
        $furniture->seen = 0;
        $furniture->describe = "";
        $imagename = "";
        if($request->hasFile("upload")){
            $image = $request->upload;
            $image = $request->file('upload')->store('public/images');
            $arr_filename = explode("/",$image);
            $imagename = end($arr_filename);
        }
        $furniture->save();

        //luu thong tin anh vao db
        $imageSave = Image::where('id_paper', $id)->first();
        if(!empty($imageSave) && $imagename != "") {
            $imageSave->name = $imagename;
            $imageSave->save();
        } elseif(empty($imageSave)) {
            $imageSave = new Image();
            $imageSave->id_paper = $furniture->id;
            $imageSave->name = $imagename;
            $imageSave->save();
        }
        $request->session()->flash('success','Sửa thành công!');
        return redirect()->route('furniture.index',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $furniture = Furniture::findOrFail($id);
        if($furniture->id_user != Auth::user()->id && Auth::user()->level < 2){
            $request->session()->flash('fail','Bạn chỉ có thể xóa bài viết của chính mình!');
            return redirect()->back();
        }
        $images = Image::where('id_paper','=',$id)->get();
        foreach ($images as $image){
            //xoá hết ảnh trong thư mục
            File::delete('storage/images/'.$image->name);
            //xóa hết ảnh trong db
            $image->delete();
        }
        //xóa bài viết
        $furniture->delete();
        $request->session()->flash('success','Bài viết đã được xóa thành công!');
        return redirect()->back();
    }

    public function deleteImage(Request $request){
        $id_paper = $request->id;
        $images = Image::where('id_paper', $id_paper)->get();
        foreach ($images as $image) {
            //xoa anh trong folder
            File::delete('storage/images/' . $image->name);
            $image->delete();
        }
        return $id_paper;
    }
}
