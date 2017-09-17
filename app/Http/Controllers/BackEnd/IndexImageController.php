<?php

namespace App\Http\Controllers\BackEnd;

use App\IndexImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class IndexImageController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = IndexImage::paginate(5);
        return view('backend.index_images.index',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.index_images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('indexImage') != null ){
            $image = $request->file('indexImage')->store('public/indexImage');
            $arr_name = explode('/',$image);
            $name = end($arr_name);
            $image = new IndexImage();
            $image->name = $name;
            $image->save();
            $request->session()->flash('success','Ảnh đã được tải lên thành công!');
            return redirect()->route('indexImage.index');
        }
        $request->session()->flash('fail','Bạn chưa chọn ảnh!');
        return redirect()->back();

    }
    public function destroy(Request $request, $id)
    {
        $image = IndexImage::findOrFail($id);
        //xoa anh trong folder
        File::delete('storage/indexImage/'.$image->name);
        //xoa anh trong database
        $image->delete();
        $request->session()->flash('success', 'Bạn đã xóa ảnh thành công!');
        return redirect()->route('indexImage.index');
    }
}
