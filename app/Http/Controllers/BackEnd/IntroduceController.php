<?php

namespace App\Http\Controllers\BackEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Introduce;

class IntroduceController extends Controller
{
    public function index()
    {   
    	$introduces = Introduce::findOrFail(1);
        return view('backend.introduce.index')->with('introduces',$introduces);
    }

    public function update(Request $request)
    {   
        $introduce = Introduce::findOrFail(1);
        $introduce->detail = $request->detail;
        // dd($introduce);
        $introduce->save();
        $request->session()->flash('success','Cập nhật giới thiệu thành công!');
        return redirect()->route('introInfo');
    }
}
