<?php

namespace App\Http\Controllers\BackEnd;

use App\ParentCat;
use App\User;
use Gate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    protected $parentcats;
    function __construct()
    {
        $this->middleware('auth');
        $this->middleware('CheckAdmin');
        $this->parentcats = ParentCat::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(10);
        return view('backend.users.index')->with('users',$users)
                                                ->with('parentcats',$this->parentcats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create')->with('parentcats',$this->parentcats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->fullname = $request->fullname;
        $user->level = $request->level;
        $user->avatar = 'avatar.png';

        if($user->save()) {
            $request->session()->flash('success', 'User was created successful');
        }else{
            $request->session()->flash('fail', 'User was created unsuccessful');
        }
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.show')->with('user',$user)->with('parentcats',$this->parentcats);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('backend.users.edit')->with('user',$user)->with('parentcats',$this->parentcats);
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
        $user = User::findOrFail($id);

        //Lay thong tin tu form
        $user->name = $request->name;
        $user->email = $request->email;
        $user->fullname = $request->fullname;
        $user->level = $request->level;

        if($request->password != null){
            $user->password = bcrypt($request->password);
        }

        if($request->file('avatar') != null){

            if($user->avatar != 'avatar.png'){
                //Xoa anh cu~
                File::delete('storage/avatars/'.$user->avatar);
            }
            //Up anh moi
            $image = $request->file('avatar')->store('public/avatars');
            $arr_filename = explode("/",$image);
            $filename = end($arr_filename);
        }else{
            $filename = $user->avatar;
        }

        $user->avatar = $filename;

        if($user->save()) {
            $request->session()->flash('success', 'User was updated successful');
        }else{
            $request->session()->flash('fail', 'User was updated unsuccessful');
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        $user = User::findOrFail($id);

        if($user->avatar != 'avatar.png'){
            //Xoa anh trong folder
            File::delete('storage/avatars/'.$user->avatar);
        }

        //Xoa record trong database
        $user->delete();
        $request->session()->flash('success', 'Xóa người dùng thành công!');
        return redirect()->route('users.index');
    }
    public function getEdit(){
        return view('backend.users.profile')->with('user',Auth::user())->with('parentcats',$this->parentcats);
    }
    public function putEdit(Request $request){
        $user = User::findOrFail(Auth::user()->id);

        //Lay thong tin tu form
        $user->name = $request->name;
        $user->fullname = $request->fullname;
        $user->level = $request->level;

        if($request->password != null){
            $user->password = bcrypt($request->password);
        }

        if($request->file('avatar') != null){

            if($user->avatar != 'avatar.png'){
                //Xoa anh cu~
                File::delete('storage/avatars/'.$user->avatar);
            }
            //Up anh moi
            $image = $request->file('avatar')->store('public/avatars');
            $arr_filename = explode("/",$image);
            $filename = end($arr_filename);
        }else{
            $filename = $user->avatar;
        }

        $user->avatar = $filename;

        if($user->save()) {
            $request->session()->flash('success', 'Cập nhật tài khoản thành công');
        }else{
            $request->session()->flash('fail', 'Cập nhật tài khoản không thành công!');
        }
        return redirect()->back();
    }
}
