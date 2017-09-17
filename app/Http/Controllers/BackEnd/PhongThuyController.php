<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PhongThuy;
use File;

class PhongThuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phongthuy = PhongThuy::orderBy('id','DESC')->paginate(5);
        return view('backend.phongthuy.index')->with('phongthuy', $phongthuy);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.phongthuy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phongthuy = new PhongThuy();
        $phongthuy->title = $request->title;
        $phongthuy->preview_text = $request->preview_text;
        $phongthuy->detail_text = $request->detail_text;
        $phongthuy->feature_image = "";
         if($request->hasFile("upload")){
            $image = $request->upload;
            // $phongthuy->feature_image = 'PT_'.date('YmdHis').'.'.$image->getClientOriginalExtension();
            $image = $request->file('upload')->store('public/phongthuy');
            $arr_filename = explode("/",$image);
            $phongthuy->feature_image = end($arr_filename);
         }
         $phongthuy->save();
         $request->session()->flash('success','Thêm thành công');
         return redirect()->route('phongthuy.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $phongthuy = PhongThuy::findOrFail($id);
        return view('backend.phongthuy.show')->with('phongthuy', $phongthuy);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $phongthuy = PhongThuy::findOrFail($id);
        return view('backend.phongthuy.edit')->with('phongthuy', $phongthuy);
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
        $phongthuy = PhongThuy::findOrFail($id);
        $phongthuy->title = $request->title;
        $phongthuy->preview_text = $request->preview_text;
        $phongthuy->detail_text = $request->detail_text;
         if($request->hasFile("upload")){
            $image = $request->upload;
            $image = $request->file('upload')->store('public/phongthuy');
            $arr_filename = explode("/",$image);
            $phongthuy->feature_image = end($arr_filename);
         }
         $phongthuy->save();
         $request->session()->flash('success','Sửa thành công');
         return redirect()->route('phongthuy.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {   
        $phongthuy = PhongThuy::findOrFail($id);
        //delete image
        if(!empty($phongthuy->feature_image)){
            $image_path = 'storage/phongthuy/'.$phongthuy->feature_image;
            //dd($image_path);
            if(File::exists($image_path)){
                //dd($image_path);
                File::delete($image_path);
            }
            //dd('end');
        }
        $phongthuy->delete();
        $request->session()->flash('success', 'Xóa thành công!');
        return redirect()->route('phongthuy.index');
    }

    public function deleteImage(Request $request){
        $phongthuy = PhongThuy::findOrFail($request->id);
        //delete image
        if(!empty($phongthuy->feature_image)){
            $image_path = 'storage/phongthuy/'.$phongthuy->feature_image;
            if(File::exists($image_path)){
                File::delete($image_path);
            }
        }
        $phongthuy->feature_image = "";
        $phongthuy->save();
        return 1;
    }
}
