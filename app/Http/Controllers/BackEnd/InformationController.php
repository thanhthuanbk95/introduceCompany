<?php

namespace App\Http\Controllers\BackEnd;

use App\ParentCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Information;

class InformationController extends Controller
{
    protected $parentcats;
    function __construct()
    {
        $this->parentcats = ParentCat::all();
    }

    public function index()
    {	
    	$information = Information::findOrFail(1);
        return view('backend.information.index')->with('information',$information)
            ->with('parentcats',$this->parentcats);
    }

    public function update(Request $request)
    {   
        $information = Information::findOrFail(1);
        $information->name = $request->name;
        $information->address = $request->address;
        $information->email = $request->email;
        $information->phone = $request->phone;
        $information->facebook = $request->facebook;
        $information->twitter = $request->twitter;
        $information->google = $request->google;
        $information->pinterest = $request->pinterest;
        // dd($information);
        $information->save();
        $request->session()->flash('success','Cập nhật thông tin thành công!');
        return redirect()->route('infor');
    }
}
