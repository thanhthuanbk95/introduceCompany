<?php

namespace App\Http\Controllers\BackEnd;

use App\Category;
use App\Http\Requests\PaperRequest;
use App\Image;
use App\Paper;
use App\ParentCat;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PaperController extends Controller
{
    protected $parentcats;
    private $idParent;
    function __construct()
    {
        $this->middleware('auth');
        $this->parentcats = ParentCat::all();
        $this->idParent = 1; //Du An
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $papers = Category::join('papers','category.id','=','papers.id_cat')
            ->join('parentcategory','category.id_parent','=','parentcategory.id')
            ->where('id_parent','=',$this->idParent)
            ->orderby('id','DESC')
            ->select(['papers.*'])
            ->paginate(10);
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
        return view('backend.paper.index',compact('papers'))
            ->with('parentcats',$this->parentcats)
            ->with('idParent',$this->idParent);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idParent = $this->idParent;
        $categories = Category::all();
        $parentcats = ParentCat::all();
        return view('backend.paper.create',compact('categories','parentcats'))
            ->with('parentcats',$this->parentcats)
            ->with('idParent',$idParent);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaperRequest $request)
    {
        $title = $request->title;
        $describe = $request->describe;
        $id_parent = $this->idParent;
        $id_cat = $request->category;
        $category = Category::findOrFail($id_cat);
        if($category->id_parent != $id_parent){
            $request->session()->flash('fail','Tiểu mục và danh mục không chính xác!');
            return redirect()->back();
        }else{
            $parentcat = ParentCat::findOrFail($id_parent);
            $paper = new Paper();
            $paper->title = $title;
            $paper->describe = $describe;
            $paper->seen = 0;
            $paper->id_cat = $id_cat;
            $paper->id_user = Auth::user()->id;
            $paper->save();
            $paper->category = $category->name;
            $paper->parentcat = $parentcat->name;
            return view('backend.paper.uploadimage',compact('paper'))
                ->with('parentcats',$this->parentcats);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paper = Paper::findOrFail($id);
        $category = Category::findOrFail($paper->id_cat);
        $parentcat = ParentCat::findOrFail($category->id_parent);
        $user = User::findOrFail($paper->id_user);
        $paper->category = $category->name;
        $paper->parentcat = $parentcat->name;
        $paper->user = $user->fullname;
        //lay danh sach anh
        $images = Image::where('id_paper','=',$id)->get();
        return view('backend.paper.show',compact('paper','images'))
            ->with('parentcats',$this->parentcats)
            ->with('idParent',$parentcat->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $paper = Paper::findOrFail($id);
        if($paper->id_user != Auth::user()->id && Auth::user()->level < 2){
            $request->session()->flash('fail','Bạn không thể thay đổi nội dung bài viết của người khác!');
            return redirect()->back();
        }
        $category = Category::findOrFail($paper->id_cat);
        $parentcat = ParentCat::findOrFail($category->id_parent);
        $paper->idcat = $category->id;
        $paper->idparent = $parentcat->id;
        //lay ds danh muc va tieu muc
        $categories = Category::all();
        $parentcats = ParentCat::all();
        //lay danh sach anh
        $images = Image::where('id_paper','=',$id)->get();
        return view('backend.paper.edit ',compact('paper','images','categories','parentcats'))
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
        $paper = Paper::findOrFail($id);
        if($paper->id_user != Auth::user()->id && Auth::user()->level < 2){
            $request->session()->flash('fail','Bạn không thể thay đổi nội dung bài viết của người khác!');
            return redirect()->back();
        }
        $title = $request->title;
        $describe = $request->describe;
        $id_cat = $request->category;
        $category = Category::findOrFail($id_cat);
        if($category->id_parent != $this->idParent){
            $request->session()->flash('fail','Tiểu mục và danh mục không chính xác!');
            return redirect()->back();
        }else{
            $paper->title = $title;
            $paper->describe = $describe;
            $paper->id_cat = $id_cat;
            $paper->id_user = Auth::user()->id;
            $paper->save();
            return redirect()->route('papers.show',$id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $paper = Paper::findOrFail($id);
        if($paper->id_user != Auth::user()->id && Auth::user()->level < 2){
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
        $paper->delete();
        $request->session()->flash('success','Bài viết đã được xóa thành công!');
        return redirect()->back();
    }
    public function uploadImage(Request $request){
        $id_paper = $request->idpaper;
        if($request->file('addimage') != null){
            //Up anh moi
            $image = $request->file('addimage')->store('public/images');
            $arr_filename = explode("/",$image);
            $filename = end($arr_filename);
            //luu thong tin anh vao db
            $imageSave = new Image();
            $imageSave->id_paper = $id_paper;
            $imageSave->name = $filename;
            $imageSave->save();
            return $imageSave;
        }
        return null;
    }
    public function deleteImage(Request $request){
        $id_image = $request->idimage;
        $image = Image::findOrFail($id_image);
        //xoa anh trong folder
        File::delete('storage/images/'.$image->name);
        $image->delete();
        return $id_image;
    }
}
